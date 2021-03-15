<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SSSE</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/hoverlink.css') }}"> --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>



        

        
        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}        
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
         



        </style>
    </head>
    <body >
 <!-- Navbar -->
 
<!-- Main Area -->
<main>
 <!-- Hero -->
 <div
   class="relative pt-16 pb-32 flex content-center items-center justify-center"
   style="min-height: 95vh"
 >
   <div
     class="absolute top-0 w-full h-full bg-top bg-cover"
     style="
       background-image: url('https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2134&q=80');
     " >
     <span
       id="blackOverlay"
       class="w-full h-full absolute opacity-75 bg-black"
     ></span>
   </div>
   <div class="container relative mx-auto" data-aos="fade-in">
     <div class="items-center flex flex-wrap">
       <div class="text-white w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
        ciao
       </div>
     </div>
   </div>
 </div>

 <!-- About Section -->
 <section id="about" class="relative py-20 bg-black text-white">
   <div class="container mx-auto px-4">
     <div class="items-center flex flex-wrap">
       <div
         class="w-full md:w-4/12 ml-auto mr-auto px-4"
         data-aos="fade-right">
         <img alt="..."
           class="max-w-full rounded-lg shadow-lg"
           src="https://images.unsplash.com/photo-1550345332-09e3ac987658?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
         />
       </div>
       <div
         class="w-full md:w-5/12 ml-auto mr-auto px-4"
         data-aos="fade-left"
       >
         <div class="md:pr-12">
           <small class="text-orange-500">About our gym</small>
           <h3 class="text-4xl uppercase font-bold">Safe Body Building</h3>
           <p class="mt-4 text-lg leading-relaxed">
             The extension comes with three pre-built pages to help you get
             started faster. You can change the text and images and you're
             good to go.
           </p>
           
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- Trainers Section -->
 <section class="pt-20 pb-48">
   <div class="container mx-auto px-4">
     <div class="flex flex-wrap justify-center text-center mb-24">
       <div class="w-full lg:w-6/12 px-4">
         <h2 class="text-4xl font-semibold uppercase">
           Meet Our Trainers
         </h2>
         <p class="text-lg leading-relaxed m-4">
           Our trainers are are here to dedicate the time and effort that
           you need to get in the best shape of your life
         </p>
       </div>
     </div>
     <!-- Trainer Card Wrapper -->
     <div class="flex flex-wrap">
       
       <!-- Card  -->
       <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4"
         data-aos="flip-right">
         <div class="px-6">
           <img
             alt="..."
             src="https://images.unsplash.com/photo-1567013127542-490d757e51fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
             class="shadow-lg rounded max-w-full mx-auto"
             style="max-width: 250px"
           />
           <div class="pt-6 text-center">
             <h5 class="text-xl font-bold">Ronald McDonald</h5>
             <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
               Double Whoopass With Cheese
             </p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- Contact Header Section -->
 <section class="pb-20 relative block bg-black text-white">
   <div
     class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
     style="height: 80px; transform: translateZ(0px)"
   >
   
   </div>
   <div class="container mx-auto px-4 lg:pt-24 lg:pb-64 pb-20 pt-20">
     <div class="flex flex-wrap text-center justify-center">
       <div class="w-full lg:w-6/12 px-4">
         <h2 class="text-4xl font-semibold text-white uppercase">
           Contact Us
         </h2>
         <p class="text-lg leading-relaxed mt-4 mb-4">
           Contact us to ask any questions, aquire a membership, talk to
           our trainers or anything else
         </p>
       </div>
     </div>
   </div>
 </section>

 <!-- Contact Form -->
 <section class="relative block py-24 lg:pt-0 bg-black">
   <div class="container mx-auto px-4">
     <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
       <div class="w-full lg:w-6/12 px-4">
         <div
           class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
           data-aos="fade-up-right"
         >
           <div class="flex-auto p-5 lg:p-10 bg-orange-500 text-white">
             <h4 class="text-2xl font-semibold">Want to work with us?</h4>
             <p class="leading-relaxed mt-1 mb-4">
               Complete this form and we will get back to you in 24 hours.
             </p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
</main>



    {{-- <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" > --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      

        AOS.init({
            delay: 200,
            duration: 1200,
            once: false,
            })
    </script>
    



</body>
</html>
