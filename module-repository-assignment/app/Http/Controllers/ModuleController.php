<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required',
            'lecturer_name' => 'required',
        ]);

        Module::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'role' => ['required', 'in:' . User::ROLE_STUDENT . ',' . User::ROLE_LECTURER],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'module_name' => 'required',
            'lecturer_name' => 'required',
        ]);

        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if ($user->role === User::ROLE_STUDENT) {
                return redirect('/')->with('error', 'You do not have permission to access this page');
            }

            return $next($request);
        })->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
}
