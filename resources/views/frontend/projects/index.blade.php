@extends('layouts.frontend')
@section('content')
    <!-- Header -->
    <section class="top-banner">
        <div class="overlay">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.projects.index') }}">المشاريع</a></li>
            </ol>
        </div>
    </section>
    <!-- End Header -->
    <!-- Donation projects -->
    <section class="donation-projects project py">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-auto col-12">
                    <h3 class="custom-head">

                        كل

                        <span> المشاريع </span>
                    </h3>
                </div>
                <div class="col-lg-3 col-12 ms-auto">
                    <select name="project-select" id="project-select" class="form-select">
                        <option value="0">الكل</option>

                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->category == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @empty
                            <p>لا توجد مشاريع </p>
                        @endforelse
                    </select>
                </div>
                <div class="col-12">
                    <div class="project-wrapper">
                        <div class="project-items tab-content">
                            <div class="row">
                                @forelse ($projects as $key => $project)
                                    @php
                                        $prec = ($project->paid / $project->value) * 100;
                                    @endphp

                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card custom-card">
                                            <img src="{{ $project->images->first()->getUrl() }}" class="card-img-top"
                                                alt="{{ $project->name }}">
                                            <div class="card-body">
                                                <a href="{{ route('frontend.projects.show', $project->id) }}">
                                                    <h5 class="card-title">
                                                        {{ $project->name }}
                                                    </h5>
                                                </a>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $prec }}%;" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <span
                                                            style="right: calc({{ $prec }}% - 23px);">{{ $prec }}%</span>
                                                    </div>
                                                </div>

                                                <div class="card-details">
                                                    <div class="card-details-item">
                                                        <span>قيمة المشروع </span>
                                                        <span>{{ $project->value }}</span>
                                                    </div>
                                                    <div class="card-details-item">
                                                        <span> المدفوع </span>
                                                        <span>{{ $project->paid }}</span>
                                                    </div>
                                                    <div class="card-details-item">
                                                        <span> المتبقى </span>
                                                        <span>{{ $project->remain }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('frontend.projects.show', $project->id) }}">
                                                <button type="submit" class="btn btn-primary qu-btn">تبرع الآن
                                                </button>
                                            </a>


                                        </div>
                                    </div>
                                @empty
                                    <p>لا توجد مشاريع </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    {{ $projects->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </section>
    <!-- End Donation projects -->
    <script>
        let elmSelect = document.getElementById('project-select');

        if (!!elmSelect) {
            elmSelect.addEventListener('change', e => {
                let choice = e.target.value;
                if (!choice) return;

                let url = new URL(window.location.href);
                url.searchParams.set('category', choice);
                url.searchParams.delete('page');
                if(choice == '0')
                    url.searchParams.delete('category');

                console.log(url);
                window.location.href = url; // reloads the page
            });
        }
    </script>
@endsection
