@extends('layouts.app')
@section('content')  

    <div class="col-md-12 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Icons</li>
            </ol>
        </div><!--/.row-->
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Dashboard</h2>
            </div>
        </div><!--/.row-->
         @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                <a href="{{route('patient.index')}}">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag"><use xlink:href="#stroked-male-user"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$patients->count()}}</div>
                            <div class="text-muted">Total Patient</div>
                        </div>
                    </div></a>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                <a href="{{route('employee.index')}}">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$total_doctor}}</div>
                            <div class="text-muted">Total Doctor</div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-2 col-lg-3 widget-left">
                            <svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></use></svg>
                        </div>
                        <div class="col-sm-10 col-lg-9 widget-right">
                            <div class="large">{{$pending['appointment']}}</div>
                            <div class="text-muted">Pending Appointment</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked  app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{$pending['completed']}}</div>
                            <div class="text-muted">Completed App:</div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--/.row-->
        
        <div class="row">
            <!-- Appointment for today -->
             <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Today Appointment</div>
                    <div class="panel-body">
                         <table id="table1" class="display" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                <th>Sn.</th>
                                <th>Name</th>
                                <th>Patient Name</th>
                                <th>Doctor</th>
                                <th>Description</th>
                                <th>Time</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->patient->first_name}} {{$appointment->patient->last_name}}</td>
                                    <td>{{$appointment->doctor->employee->first_name}} {{$appointment->doctor->employee->middle_name}} {{$appointment->doctor->employee->last_name}}</td>
                                    <td>{{$appointment->description}}</td>
                                    <td>{{ $appointment->created_at->format('Y-m-d') }}</td>
                                    <td>
                                     @if($appointment->status)
                                    <a class="btn-sm btn-success" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-ok"></span> Complete</a>    
                                    @else
                                    <a class="btn-sm btn-warning" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-remove"> </span> Pending</a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>                 
                        </table>
                    </div>
                </div>
            </div>
            <!-- Appointmet table ends -->

        </div><!--/.row-->
        </div>
        

    <script type="text/javascript">
        $(document).ready(function(){
            $('#table').DataTable();
            $('#table1').DataTable();

        });
    </script>
@endsection
