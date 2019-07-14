@extends('frontend.layout.app')


@section('content')


<!--  login page  -->
        <div class="container mainContainer full-width out-hidden">
           
            <div class="register loginPage">
               
                {!! Form::open() !!}
                    <table>
                        <tr>
                            <td>
                                <img src=" {{ url('frontend/images/images.png') }} " />
                            </td>
                            <td>
                                <h1>Login</h1>
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
                            <td class="label">
                                <label>Password:</label>
                            </td>
                            <td class="txtboxes">
                                <input type="password" name="password" class="box full-width" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="submitBtn full-width btn" >Login</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href=" {{ url('forg_pass') }} ">forget password?</a>
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
                <div class="my-msg success-msg">
                    {{Session::get('success')}}
                </div>
             @endif
                
            </div>
            
        </div>
        <!--  end signup page -->


@stop