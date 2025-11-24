namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model   = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email dan password wajib diisi.');
        }

        // Ambil user berdasarkan email
        $user = $model->where('email', $email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }

        // Cek password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }

        // Jika sukses, set session
        $session->regenerate(); // keamanan CSRF session fixation

        $session->set([
            'user_id'     => $user['id'],
            'email'       => $user['email'],
            'role'        => $user['role'],
            'isLoggedIn'  => true
        ]);

        return redirect()->to('/user/profile');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
