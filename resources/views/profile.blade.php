@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="profile-panel" class="panel panel-default">
                <img src="{{ asset('img/no-profile.gif') }}" width="120">
                <div id="profile-heading" class="panel-heading">Nama si Anying</div>

                <div class="panel-body">
                    <table class="all">
                        <tr>
                            <td id="profile-info">
                                <h4>Profile Info <a onclick="showEditor()">&#9998;</a></h4>
                                <table class="profile-info">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $user->phone }}</td>    
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="content">
                                <button class="accordion" onclick="show('panel1')">My Store</button>
                                <div id="panel1" class="hide">
                                  <div id="barang">
                                      <img src="{{ asset('img/add.png') }}">
                                  </div>
                                </div>

                                <button class="accordion" onclick="show('panel2')">Message Box</button>
                                <div id="panel2" class="hide">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>

                                <button class="accordion" onclick="show('panel3')">Section 3</button>
                                <div id="panel3" class="hide">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </td>
                    </table>
                </div>
                
                <div id="profile-heading" class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Mee
                </div>                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function show(panel) {
        var p = document.getElementById(panel);
        if (p.className.indexOf("show") == -1) {
            p.className += "show";
        } else {
            p.className = p.className.replace("show", "");
        }
    }

        // Get the modal
    var modal = document.getElementById('edit-profile-modal');

    // Get the button that opens the modal

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    function showEditor() {
        console.log('link clicked');
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
@endsection

<!-- The Modal -->
<div id="edit-profile-modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>