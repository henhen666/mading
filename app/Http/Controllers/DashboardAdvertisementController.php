<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class DashboardAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.advertisement.advertisement', [
            'title'     => "Advertisement | Dashboard",
            'iklan'     => Advertisement::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.advertisement.create', [
            'title'     => "Create New Advertisement"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // ddd($request);
        $validatedData = $request->validate([
            'image'     => 'image|file|max:8192',
            'deskripsi' => 'max:255'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('advertisement-images');
        }

        Advertisement::create($validatedData);

        return redirect('dashboard/advertisement')->with('success', 'Iklan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        Advertisement::destroy($advertisement->id);

        return back()->with('success', "Iklan Berhasil Dihapus!");
    }

    public function truncate()
    {
        Advertisement::truncate();

        return back()->with('success', 'Iklan Berhasil Dikosongkan');
    }
}
