@extends('layouts.business')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="material-icons float-left">info_outline</i>
                        How to use EasyBiz for business
                </div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth('admin') 
                        Hi {{ auth('admin')->user()->name }}
                        You are logged in as admin!
                    @else
                        Welcome Guest!

                    @endAuth -->

                    <h6 class="text-primary">Creating a Bookable template</h6>
                    <ol>
                       <li>Go to "Bookable template" => "Design new template"</li> 
                       <li>Add the name of the template, notes about the template, select category and click "Start designing"</li> 
                       <li>It will redirect you to designing page</li>
                       <li>Click the parent cell and start editing your template</li>
                       <li><span class="text-warning">CELL DIVISION:</span> Click or highlight cell to divide by changing the Columns and Rows field on the right side, the Parent cell will be divided automatically. You can divide many cells depending on your business needs.</li>
                       <li><span class="text-warning">BOOKABLE ASSIGNMENT:</span> After dividing the cells to your desired design, you can assign what cells can be bookable by changing the "Cell division" to "Bookable assignment". </li>
                       <li>Click the cell, and add Name/Code and Price for the bookable cell.</li>
                       <li>Save the template when you are finished.</li>
                       <li>A bookable template can be used in different Bookable schedules.</li>
                    </ol>

                    <h6 class="text-primary">Creating a Bookable schedule</h6>
                    <ol>
                       <li>Go to "Bookable Schedules" => "Add new bookable"</li> 
                       <li>Fill up the form for creating a bookable Schedule and Select the template you just created.</li>
                       <li>When the bookable schedule is created, customers can now book in your created schedule. (within the customer side)</li>
                    </ol>

                    <h6 class="text-primary">Adding/Editing staff </h6>
                    <ol>
                       <li>Go to "Staff" => "Add new staff"</li> 
                       <li>Fill the form to create new staff, select the desired roles/privileges for the staff.</li>
                       <li>To edit staff, to go "Staff" => "View all" and select the staff you want to edit</li>
                       <li>Staff can log in to the EasyBiz Business side to manage the same business depending on their roles.</li>
                    </ol>

                    <h6 class="text-primary">Verifying ticket</h6>
                    <ol>
                       <li>Go to the "Verifying ticket" section</li> 
                       <li>You have two ways to verify ticket reservation, By Entering Ticket code(provided by the customer that had booked/reserved in your business) or by Scanning the QR code (from customer phone)</li>
                       <li>Verifying QR required webcam or phone camera.</li>
                       <li>Make sure you load the EasyBiz web app with 'https' and allow the camera permission to work well.</li>
                    </ol>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
