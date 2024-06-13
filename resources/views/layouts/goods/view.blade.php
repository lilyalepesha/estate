<section class="best">
    <h1 style="text-align: center; margin-right: 1250px; color: white; font-weight: bold">{{ $project->name }}</h1>
    <div class="container best__container">
        <div class="best__image-wrapper">
            @if(!empty($project->main_image))
                <img src="{{ $project->main_image }}" alt="best" class="big-image image">
            @endif

            @if(!empty($project->small_images))
                <div class="small-images">
                    @foreach($project->small_images as $image)
                        <img src="{{ $image }}" class="image" alt="best">
                    @endforeach
                </div>
            @endif
        </div>
        @if(!empty($project->big_images))
            <div class="best__image-wrapper">
                @foreach($project->big_images as $image)
                    <img src="{{ $image }}" class="image" alt="best">
                @endforeach
            </div>
        @endif

        <div class="best__content">
            <h3 class="best__content-title">
                Описание
            </h3>
            <p class="best__content-text">
                {{ $project->description }}
            </p>
        </div>
        @auth
            <form method="POST" class="goods__send-order" action="{{ route('goods.send') }}">
                @csrf
                <input name="project_id" type="hidden" value="{{ $project->id }}">
                <input name="architect_id" type="hidden" value="{{ $project->architect_id }}">
                <button type="submit">Оформить заказ</button>
            </form>
        @endauth
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
</section>

