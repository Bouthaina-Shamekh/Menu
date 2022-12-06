<!DOCTYPE html>
<html dir="rtl" lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge" />
    <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
    <title>Epic Menu</title>
    <link rel="stylesheet" href="{{asset('frontend/dist/output.css')}}" />
  </head>
  <body class="bg-zinc-900 text-zinc-50">
    <div class="flex flex-row items-center justify-center">
      <div class="mx-auto min-h-screen w-full border-x border-zinc-800/50 bg-zinc-800/25 md:max-w-xl">
        <img src="{{ asset('uploads/meals/' . $meals->image) }}" />
        <main class="flex flex-col items-center justify-center p-3 sm:p-5">
          <h2 class="mb-5 text-base font-semi-bold leading-none sm:text-lg">{{$meals->name}}</h2>
          <div class="mb-3 flex items-center justify-center gap-1.5 sm:mb-5 sm:gap-3">
            <p class="text-sm font-semi-bold leading-none text-yellow-500 sm:text-base">{{$meals->price}} SR</p>
            <div class="inline-block h-1 w-1 rounded-full bg-zinc-50"></div>
            <div class="flex items-center justify-center gap-1.5">
              <svg class="h-6 w-6 fill-yellow-500 stroke-none">
                <use xlink:href="./src/icons/icons.svg#calories" />
              </svg>
              <p class="text-sm font-semi-bold leading-none text-zinc-50 sm:text-base"> {{$meals->calories}}سعرة حرارية</p>
            </div>
          </div>
          <div class="mb-3 flex w-max items-start justify-start gap-1.5 sm:mb-5 sm:gap-3">
            <svg class="h-6 w-6 fill-yellow-500 stroke-none">
              <use xlink:href="./src/icons/icons.svg#icon-1" />
            </svg>
            <svg class="h-6 w-6 fill-yellow-500 stroke-none">
              <use xlink:href="./src/icons/icons.svg#icon-2" />
            </svg>
            <svg class="h-6 w-6 fill-yellow-500 stroke-none">
              <use xlink:href="./src/icons/icons.svg#icon-3" />
            </svg>
          </div>
          <p class="mb-5 text-center text-sm leading-relaxed text-zinc-50 line-clamp-3 sm:text-base">{{$meals->content}} </p>


        </main>
      </div>
      <div class="hidden flex-1 items-center justify-center md:flex">
        <span class="mb-5 text-sm font-bold uppercase leading-none tracking-[0.2em]">Logo</span>
      </div>
    </div>
    <script src="{{ asset('frontend/data.js')}}"></script>
  </body>
</html>
