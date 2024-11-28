@extends('layout.app')

@section('title', __('Chat'))

@section('content')

    <style>

        .chat-wrapper {
            height: 100vh;
            display: flex;
        }

        /* Sidebar Styles */
        .chat-sidebar {
            width: 300px;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .chat-list {
            overflow-y: auto;
            flex-grow: 1;
        }

        .online-indicator {
            width: 8px;
            height: 8px;
            background: #10B981;
            border-radius: 50%;
        }

        /* Main Chat Styles */

        .date-divider {
            font-size: 0.875rem;
        }

        .message {
            max-width: 80%;
        }

        .message-status {
            color: #10B981;
            margin-top: 0.25rem;
            text-align: right;
        }

        .video-preview {
            max-width: 80%;
        }

        .link-preview {
            max-width: 80%;
        }

        .chat-input {
            padding: 1rem;
            background: white;
            border-top: 1px solid #e5e7eb;
        }

        .input-container {
            display: flex;
            align-items: center;
            background: #F3F4F6;
            border-radius: 2rem;
            padding: 0.5rem;
        }

        .input-container input {
            border: none;
            background: transparent;
            flex-grow: 1;
            padding: 0.5rem;
            margin: 0 0.5rem;
        }

        .input-container input:focus {
            outline: none;
        }

        .input-container button {
            background: none;
            border: none;
            color: #6B7280;
            padding: 0.5rem;
            cursor: pointer;
        }

        .send-button {
            color: #6366F1 !important;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .chat-sidebar {
                display: none;
            }

            .message, .video-preview, .link-preview {
                max-width: 85%;
            }
        }
    </style>


    <div class="card">
        <div class="chat-wrapper">
            <!-- Sidebar -->
            <aside class="chat-sidebar border-end d-flex h-100">
                <div class="p-3">
                    <div class="d-flex align-items-center mb-3">
                        <i class="mdi mdi-message-text me-2"></i>
                        <h5 class="mb-0">My Chats</h5>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0 bg-transparent">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search...">
                    </div>
                </div>

                <div class="chat-list">
                    <!-- Chat List Items -->

                    <div class="border-bottom d-flex align-items-center gap-2 px-2 py-2">
                        <div class="position-relative">
                            <img src="{{ asset('assets/img/my/defaults/default.png') }}" class="rounded-circle border border-secondary" alt="Avatar" style="width: 40px;height: 40px;">
                            <span class="position-absolute bottom-0 end-0 bg-secondary rounded-circle p-1 border border-2 border-white"></span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0">X_AE_A-13b</h6>

                            </div>
                            <small class="text-muted">Enter your message des...</small>
                        </div>
                        <div class="text-center">
                            <small class="text-secondary d-block">12:25</small>
                        </div>
                    </div>


                    <div class="border-bottom d-flex align-items-center gap-2 px-2 py-2">
                        <div class="position-relative">
                            <img src="{{ asset('assets/img/my/defaults/default.png') }}" class="rounded-circle border border-secondary" alt="Avatar" style="width: 40px;height: 40px;">
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-2 border-white"></span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0">X_AE_A-13b</h6>

                            </div>
                            <small class="text-muted">Enter your message des...</small>
                        </div>
                        <div class="text-center">
                            <small class="text-secondary d-block">12:25</small>
                            <span class="badge bg-primary rounded-pill d-block">999</span>
                        </div>
                    </div>


                    <div class="border-bottom d-flex align-items-center gap-2 px-2 py-2">
                        <div class="position-relative">
                            <img src="{{ asset('assets/img/my/defaults/default.png') }}" class="rounded-circle border border-secondary" alt="Avatar" style="width: 40px;height: 40px;">
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-2 border-white"></span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0">X_AE_A-13b</h6>

                            </div>
                            <small class="text-muted">Enter your message des...</small>
                        </div>
                        <div class="text-center">
                            <small class="text-secondary d-block">12:25</small>
                            <span class="badge bg-primary rounded-pill d-block">999</span>
                        </div>
                    </div>

                    <div class="border-bottom d-flex align-items-center gap-2 px-2 py-2">
                        <div class="position-relative">
                            <img src="{{ asset('assets/img/my/defaults/default.png') }}" class="rounded-circle border border-secondary" alt="Avatar" style="width: 40px;height: 40px;">
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-2 border-white"></span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-0">X_AE_A-13b</h6>

                            </div>
                            <small class="text-muted">Enter your message des...</small>
                        </div>
                        <div class="text-center">
                            <small class="text-secondary d-block">12:25</small>
                            <span class="badge bg-primary rounded-pill d-block">999</span>
                        </div>
                    </div>
                    <!-- More chat items would go here -->
                </div>
            </aside>

            <!-- Main Chat Area -->
            <main class="flex-grow-1 d-flex flex-column">
                <div class="chat-header d-flex align-items-center p-3 border-bottom">
                    <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Avatar" class="rounded-circle me-3 border border-secondary" style="width: 40px;height: 40px;">
                    <div>
                        <h6 class="mb-0">X_AE_A-13b</h6>
                        <small class="text-muted">Last seen 7h ago</small>
                    </div>
                    <div class="ms-auto d-flex gap-2">
                        <button class="btn btn-outline-secondary rounded-pill"><i class="mdi mdi-share"></i></button>
                        <button class="btn btn-outline-secondary rounded-pill"><i class="mdi mdi-magnify"></i></button>
                        <button class="btn btn-outline-secondary rounded-pill"><i class="mdi mdi-dots-vertical"></i></button>
                    </div>
                </div>

                <div class="overflow-y-auto flex-grow-1 p-3">
                    <div class="date-divider my-1 mx-0 text-secondary text-center">25 April</div>

                    <div class="message position-relative mb-3 me-auto">
                        <div class="message-content bg-light border px-3 py-2 rounded-4 rounded-bottom-start-1">Hey man!</div>
                        <div class="message-time mt-1 text-primary my-fs-8">11:25</div>
                    </div>

                    <div class="message position-relative mb-3 ms-auto">
                        <div class="message-content text-white bg-primary rounded-bottom-right-1 px-3 py-2 rounded-4">Hey, what's up? How are you doing, my friends? It's been a while xD</div>
                        <div class="message-time text-end mt-1 text-primary my-fs-8">12:25</div>
                    </div>
                    <div class="message-status my-fs-8">Sent</div>

                    <!-- Video Preview -->
                    <div class="video-preview mb-3 bg-primary rounded-4 overflow-hidden ms-auto">
                        <div class="position-relative">
                            <img src="{{ asset('assets/img/my/defaults/default.png') }}" alt="Video thumbnail" class="w-100">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="mdi mdi-play-circle" style="font-size: 48px; color: white;"></i>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="message-time mt-1 text-white my-fs-8">02:25</div>
                        </div>
                    </div>
                    <div class="message-status my-fs-8">Sent</div>

                    <!-- Link Preview -->
                    <div class="link-preview mb-3 text-white bg-primary p-3 rounded-4 ms-auto">
                        <h6>External Link Title</h6>
                        <p class="mb-1">External link description</p>
                        <p class="mb-2">https://www.externallink.com</p>
                        <div class="message-time mt-1 text-white-50 my-fs-8">04:25</div>
                    </div>
                    <div class="message-status my-fs-8">Sent</div>
                </div>

                <div class="chat-input">
                    <div class="input-container">
                        <button><i class="mdi mdi-plus"></i></button>
                        <input type="text" placeholder="Write your message...">
                        <button><i class="mdi mdi-microphone"></i></button>
                        <button class="send-button"><i class="mdi mdi-send"></i></button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="chat">
        <div id="messages"></div>
        <input type="text" id="message" placeholder="Type your message...">
        <button id="send">Send</button>
    </div>
    
    <span class="my my-edit"></span>


    <script>

        Pusher.logToConsole = true;
        var pusher = new Pusher('f513c6dba43174cbee4d', {
            cluster: 'eu'
        });

        $(document).ready(function() {
            var channel = pusher.subscribe('chat-channel');
            channel.bind('message.sent', function(data) {
                console.log(data);
            });
        });

        document.getElementById('send').addEventListener('click', () => {
            const message = document.getElementById('message').value;
    
            fetch('/send-message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ message }),
            });
        });
    </script>
    
@endsection
