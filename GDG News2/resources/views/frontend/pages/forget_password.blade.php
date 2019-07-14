@extends('frontend.layout.app')


@section('content')


<!--  forget password page  -->
        <div class="container mainContainer full-width out-hidden">
           
            <div class="register forgPass">
               
                {!! Form::open() !!}
                    <table class="full-width">
                        <tr>
                            <td colspan="2">
                                <h1>Forget Password</h1>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">
                                <label>Email:</label>
                            </td>
                            <td class="txtboxes">
                                <input type="email" name="email" class="box full-width" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="submitBtn full-width btn">Send</button>
                            </td>
                        </tr>
                    </table>
                {!! Form::close() !!}
                               
                
               @if ($errors->any())
                <div class="my-msg error-msg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
             
              @if(Session::has('error'))
                 <div class="my-msg error-msg">
                    {{Session::get('error')}}
                </div>
             @elseif(Session::has('success'))
                <div class="success-msg">
                     {!! Session::get('success') !!}
                </div>
             @endif                               
                               
                                
            </div>
            
        </div>
        <!--  end forget password page -->


@stop