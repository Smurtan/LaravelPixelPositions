<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <form action="" method="post">
                @csrf

                <input type="text" name="" id="" placeholder="Web Developer..." class="rounded-xl bg-white/5 border border-white/10 px-5 py-4 w-full mt-6 max-w-xl">
            </form>
        </section>

        <section class="pt-10">
            <x-section-header>Feature Jobs</x-section-header>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <x-job-card :$job/>
                @endforeach
            </div>
        </section>

        <section>
            <x-section-header>Tags</x-section-header>

            <div class="mt-6 space-x-1">
                @foreach($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-header>Recent Jobs</x-section-header>

            <div class="mt-6 space-x-1 space-y-6">
                @foreach($tags as $tag)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
