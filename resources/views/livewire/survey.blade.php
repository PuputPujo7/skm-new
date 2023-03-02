<div>
    <div class="overflow-hidden bg-transparent py-16 px-4 sm:px-6 lg:px-8 lg:py-24">
        <div class="relative mx-auto max-w-4xl">

            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Survey</h2>
                <p class="mt-4 text-lg leading-6 text-gray-500">Survey Kepuasan Masyarakat</p>
            </div>
            <div class="mt-12">
                <form wire:submit.prevent="submit">
                    <dl class=" divide-gray-200">
                        <div class="pt-6 pb-8 grid-cols-12 md:grid md:grid-cols-12 md:gap-8">
                            @foreach ($surveys as $survey)
                                <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                    {{ $survey->pertanyaan->pertanyaan}}x
                                </dt>

                                <dd class="mt-2 md:col-span-7 md:mt-0">
                                    <div x-data="{
                                        rating: 0,
                                        hoverRating: 0,
                                        ratings: {{ json_encode($survey->answer_options, true) }},
                                        rate(amount) {
                                            if (this.rating == amount) {
                                                this.rating = 0;
                                            } else this.rating = amount;
                                        },
                                        currentLabel() {
                                            let r = this.rating;
                                            if (this.hoverRating != this.rating) r = this.hoverRating;
                                            let i = this.ratings.findIndex(e => e.amount == r);
                                            if (i >= 0) { return this.ratings[i].label; } else { return '' };
                                        }
                                    }"
                                        class="flex flex-col items-end justify-center rounded bg-transparent mx-auto">
                                        <div wire:key="star{{ $loop->index + 1 }}" wire:model="rating.{{ $loop->index }}"
                                            class="flex space-x-0 bg-transparent">
                                            <template x-for="(star, index) in ratings" :key="index">
                                                <div @click="$dispatch('input', star.amount); rate(star.amount)"
                                                    @mouseover="hoverRating = star.amount"
                                                    @mouseleave="hoverRating = rating" aria-hidden="true"
                                                    :title="star.label"
                                                    class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                                                    :class="{ 'text-gray-600': hoverRating >= star
                                                        .amount, 'text-yellow-400': rating >= star.amount &&
                                                            hoverRating >= star.amount }">
                                                    <svg class="w-15 transition duration-150"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                </div>

                                            </template>
                                        </div>
                                        <div class="p-2">
                                            <template x-if="rating || hoverRating">
                                                <p x-text="currentLabel()"></p>
                                            </template>
                                            <template x-if="!rating && !hoverRating">
                                                <p>Please Rate!</p>
                                            </template>
                                        </div>
                                    </div>
                                </dd>
                            @endforeach
                            <div class="sm:col-span-12">
                                <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                                <div class="mt-1">
                                    <textarea wire:model="review" id="review" required name="review" rows="4"
                                        class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- More questions... -->
                    </dl>
                    {{-- {{ $this->form }} --}}
                    <div class="sm:col-span-2">
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-blue-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
