<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">
                        @if(count($notifi) <= 3)
                            {{ count($notifi) }}
                        @else
                             3+
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @foreach($notifi as $value)
                    <span href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            @if($value->user->avatar)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($value->user->avatar) }}" alt="User Avatar" class="img-size-50 mr-3 img-circle" style="width:40px;height:40px">
                            @else
                                <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" style="width:40px;height:40px">
                            @endif
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{ $value->user->name }}
                                    <a class="float-right text-sm text-danger" href="{{ route('delete.notifi',$value->id) }}">X</a>
                                </h3>
                                <p class="text-sm">{{ $value->content }}</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $value->created_at }}</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </span>
                    <div class="dropdown-divider"></div>
                    @endforeach
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
           
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>