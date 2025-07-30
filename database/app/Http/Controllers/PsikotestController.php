<?php

namespace App\Http\Controllers;

use App\Models\Akun_psikotest;
use App\Models\Apply;
use App\Models\Psikotest;
use App\Models\PsikotestAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PsikotestController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $lamaran = Apply::where('id', $userId)
                ->where('psikotest', 1)
                ->first();

        if (!$lamaran || !$lamaran->psikotest) {
            return view('guest.psikotest.fail');
        }

        $json = json_decode(file_get_contents(public_path('list.json')), true);
        return view('guest.psikotest.index', ['questions' => $json['questions']]);
    }

    public function submit(Request $request)
    {
        $request->validate(['answers' => 'required|array']);
        $answers = $request->input('answers');
        $questions = json_decode(file_get_contents(public_path('list.json')), true)['questions'];

        if (count($answers) < count($questions)) {
            return back()->withErrors(['message' => 'Semua pertanyaan wajib dijawab.']);
        }

        $scores = ['E'=>0,'I'=>0,'S'=>0,'N'=>0,'T'=>0,'F'=>0,'J'=>0,'P'=>0];

        foreach ($answers as $i => $a) {
            $type = ($i + 1) % 4;
            switch ($type) {
                case 1: $scores[$a == 0 ? 'E' : 'I']++; break;
                case 2: $scores[$a == 0 ? 'S' : 'N']++; break;
                case 3: $scores[$a == 0 ? 'T' : 'F']++; break;
                case 0: $scores[$a == 0 ? 'J' : 'P']++; break;
            }
        }

        $matrix = [['E','I'],['S','N'],['T','F'],['J','P']];
        $result = collect($matrix)
            ->map(fn($p) => $scores[$p[0]] >= $scores[$p[1]] ? $p[0] : $p[1])
            ->implode('');

        Psikotest::create([
            'answers' => $answers,
            'result' => $result,
        ]);

        return redirect()->route('guest.dashboard')->with('success', 'Psikotest berhasil disimpan!');
    }

    public function hasil($id)
    {
        $lamaran = Apply::findOrFail($id);
        $psikotest = Psikotest::where('id', $lamaran->id)->first();

        if (!$psikotest) {
            return back()->with('error', 'Psikotest belum tersedia.');
        }

        $scores = ['E'=>0,'I'=>0,'S'=>0,'N'=>0,'T'=>0,'F'=>0,'J'=>0,'P'=>0];
        $questions = json_decode(file_get_contents(public_path('list.json')), true)['questions'];

        foreach ($psikotest->answers as $i => $a) {
            $type = ($i + 1) % 4;
            switch ($type) {
                case 1: $scores[$a == 0 ? 'E' : 'I']++; break;
                case 2: $scores[$a == 0 ? 'S' : 'N']++; break;
                case 3: $scores[$a == 0 ? 'T' : 'F']++; break;
                case 0: $scores[$a == 0 ? 'J' : 'P']++; break;
            }
        }

        $percentages = [
            'E/I' => round($scores['E'] / ($scores['E'] + $scores['I']) * 100),
            'S/N' => round($scores['S'] / ($scores['S'] + $scores['N']) * 100),
            'T/F' => round($scores['T'] / ($scores['T'] + $scores['F']) * 100),
            'J/P' => round($scores['J'] / ($scores['J'] + $scores['P']) * 100),
        ];

        return view('staff.lamaran.hasil', [
            'lamaran' => $lamaran,
            'psikotest' => $psikotest,
            'percentages' => $percentages
        ]);
    }
    public function manageIndex()
{
    $akunList = Akun_Psikotest::with('psikotest')->get();
    return view('staff.manage_psikotest.index', compact('akunList'));
}

    public function storeAkun(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun_psikotests,email',
            'password' => 'required|min:1',
            'jadwal' => 'required|date',
            
        ],
        [
            'nama.required' => 'Nama akun psikotest wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'jadwal.required' => 'Jadwal wajib diisi.',
        ]);

        Akun_Psikotest::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('manage.psikotest.index')->with('success', 'Akun psikotest berhasil dibuat.');
    }

}
