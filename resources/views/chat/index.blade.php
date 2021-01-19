@extends('layouts.app')

@section('title_content') Chat @endsection

@section('myScripts')
    <script>
        $(document).ready(function() {
            $('#mensaje').keyup(function(event) {
                if (event.which === 13) {
                    event.preventDefault();
                    $('#enviar_mensaje').submit();
                }
            });
        });
    </script>
@endsection

@section('content')

<div class="section-body py-3 chat_app">
    <div class="chat_list" id="users" style="background-color: #F7F7F7 !important;">
        <a href="/chat/crear" class="btn btn-primary btn-block mt-2 mb-4">Crear Chat</a>
        <h3 class="font-weight-bolder">Chats</h3>
        <div class="input-group mt-3 mb-2">
            <input type="text" class="form-control search" placeholder="Buscar...">
        </div>
        <ul class="right_chat list-unstyled list">
            @if ( Request::is('chat/crear') )
                @foreach ($users as $user)
                    <li class="online">
                        <a href="/chat/mensajes/{{ $user->id }}" class="media">
                            <img class="media-object" src="../assets/images/xs/avatar4.jpg" alt="">
                            <div class="media-body">
                                <span class="name">{{ $user->name }}</span>
                                <span class="message">Iniciar Char</span>
                                <span class="badge badge-outline status"></span>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif

            @if ( Request::is('chat') )
                @foreach ($chats as $chat)
                    <li class="online">
                        <a href="javascript:void(0);" class="media">
                            <img class="media-object" src="../assets/images/xs/avatar4.jpg" alt="">
                            <div class="media-body">
                                <span class="name">Ava Phillip Smith <span class="badge badge-primary badge-pill float-right">14</span></span>
                                <span class="message">Are we meeting today?</span>
                                <span class="badge badge-outline status"></span>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="chat_room">
        <div class="card-header pt-0 pl-0 pr-0">
            <h3 class="card-title font-weight-bolder">Friends Group <small>Last seen: 2 hours ago</small></h3>
        </div>
        <div class="chat_windows">
            <ul class="mb-0">
                <li class="other-message">
                    <img class="avatar mr-3" src="../assets/images/xs/avatar2.jpg" alt="avatar">
                    <div class="message">
                        <p class="bg-light-blue">Are we meeting today?</p>
                        <span class="time" >10:10 AM, Today</span>
                    </div>
                </li>
                <li class="other-message">
                    <img class="avatar mr-3" src="../assets/images/xs/avatar3.jpg" alt="avatar">
                    <div class="message">
                        <p class="bg-light-cyan">Hi Aiden, how are you? How is the project coming along?</p>
                        <p class="bg-light-cyan">Are we meeting today?</p>
                        <span class="time" >10:15 AM, Today</span>
                    </div>
                </li>
                <li class="my-message">
                    <div class="message">
                        <p class="bg-light-gray">Project has been already finished and I have results to show you.</p>
                        <div class="file_folder">
                            <a href="javascript:void(0);">
                                <div class="icon">
                                    <i class="fa fa-file-excel-o text-success"></i>
                                </div>
                                <div class="file-name">
                                    <p class="mb-0 text-muted">Report2017.xls</p>
                                    <small>Size: 68KB</small>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="icon">
                                    <i class="fa fa-file-word-o text-primary"></i>
                                </div>
                                <div class="file-name">
                                    <p class="mb-0 text-muted">Report2017.doc</p>
                                    <small>Size: 68KB</small>
                                </div>
                            </a>
                        </div>
                        <span class="time">10:17 AM, Today</span>
                    </div>
                </li>
                <li class="other-message">
                    <img class="avatar mr-3" src="../assets/images/xs/avatar4.jpg" alt="avatar">
                    <div class="message">
                        <div class="media_img">
                            <img src="../assets/images/gallery/1.jpg" class="w150 img-thumbnail" />
                            <img src="../assets/images/gallery/2.jpg" class="w150 img-thumbnail" />
                        </div>
                        <span class="time" >10:15 AM, Today</span>
                    </div>
                </li>
                <li class="other-message">
                    <span class="avatar avatar-blue mr-3">NG</span>
                    <div class="message">
                        <p class="bg-light-pink">Are we meeting today I have results?</p>
                        <p class="bg-light-pink">Project has been already finished and to show you.</p>
                        <span class="time" >10:18 AM, Today</span>
                    </div>
                </li>
                <li class="my-message">
                    <div class="message">
                        <p class="bg-light-gray">Well we have good budget for the project</p>
                        <span class="time">10:25 AM, Today</span>
                    </div>
                </li>
                <li class="my-message">
                    <div class="message">
                        <div class="media_img">
                            <img src="../assets/images/gallery/3.jpg" class="w100 img-thumbnail" />
                            <img src="../assets/images/gallery/4.jpg" class="w100 img-thumbnail" />
                            <img src="../assets/images/gallery/5.jpg" class="w100 img-thumbnail" />
                            <img src="../assets/images/gallery/6.jpg" class="w100 img-thumbnail" />
                        </div>
                        <span class="time">10:25 AM, Today</span>
                    </div>
                </li>
            </ul>
            <div class="chat-message clearfix bg-white">
                {{-- <a href="javascript:void(0);"><i class="icon-camera"></i></a>
                <a href="javascript:void(0);"><i class="icon-camcorder"></i></a>
                <a href="javascript:void(0);"><i class="icon-paper-plane"></i></a> --}}
                <div class="mb-0">
                    <form action="/chat/mensajes/enviar" id="enviar_mensaje" method="post">
                        @csrf

                        <textarea type="text" class="form-control col-12" name="mensaje" id="mensaje" placeholder="Escriba aqui el mensaje..."></textarea>
                        <input type="hidden" name="chat_id" value="{{ $chat->id ?? '' }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
