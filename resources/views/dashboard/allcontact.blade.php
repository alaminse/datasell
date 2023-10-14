@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Manage All Contact</h2>
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allcontacts as $allcontact)
                        <tr>
                            <td>{{$allcontact->name}}</td>
                            <td>{{$allcontact->email}}</td>
                            <td>{{$allcontact->phone}}</td>
                            <td>{{$allcontact->message}}</td>
                            <td>
                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                     </tbody>
                  </table>
            </div>
        </div>
    </div>
</section>
@endsection