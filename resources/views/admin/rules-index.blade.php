@extends('layout.mixed')

@section('title', 'Bütün Qaydalar')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <a href="{{route('admin.rules.create')}}" class="btn btn-outline-success mb-4">Yeni qayda</a>
    </div>
    
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Qaydaların siyahısı</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4 col-narrow">
                    @if($rules->total() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Qaydanın adı</th>
                                <th>Status</th>
                                <th>Aktivlik</th>
                                <th width="250px">Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">                            
                                @foreach($rules as $rule)
                                    <tr>
                                        <td>{{ $rule->title}}</td>

                                        <td>{{ $rule->parent_id === null ? 'Ana qayda' : '' }}</td>

                                        <td>
                                            <span class="badge bg-label-{{ 
                                                $rule->activate === 'active' ? 'success' : 'info'}} me-1">
                                                {{ $rule->activate_text }}
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.rules.edit', $rule->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen me-2"></i>Yenilə</a>

                                            <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                            </form>
                                        </td>
                                    </tr>

                                     @foreach($rule->children as $child)
                                        <tr>
                                            <td>— {{ $child->title }}</td>
                                            <td>Alt qayda</td>
                                            <td>
                                                <span class="badge bg-label-{{ $child->activate === 'active' ? 'success' : 'info' }} me-1">
                                                    {{ $child->activate_text }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.rules.edit', $child->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen me-2"></i>Yenilə</a>
                                                
                                                <form action="{{ route('admin.rules.destroy', $child->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                        </tbody>
                    </table>  
                    @else
                        <div class="alert alert-info" role="alert">Heç bir qayda qeydə alınmayıb.</div>
                    @endif              
                </div>
                
                <!-- Custom Pagination for Admin Panel -->
                @if ($rules->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- İlk Sayfa --}}
                            <li class="page-item first {{ $rules->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rules->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>

                            {{-- Önceki Sayfa --}}
                            <li class="page-item prev {{ $rules->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rules->previousPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>

                            {{-- Sayfa Numaraları --}}
                            @foreach ($rules->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $rules->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Sonraki Sayfa --}}
                            <li class="page-item next {{ !$rules->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rules->nextPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>

                            {{-- Son Sayfa --}}
                            <li class="page-item last {{ !$rules->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $rules->url($rules->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></i></a>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection