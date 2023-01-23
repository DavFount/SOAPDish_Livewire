@extends('layouts.app')

@section('body')
    <x-hero>
    <x-slot:header>
        Welcome to The SOAP Dish
    </x-slot:header>

    The SOAP method encourages a deeper dive into scripture than simply
    reading God's word. SOAP is an acronym which means Scripture, Observation,
    Application, Prayer.
    </x-hero>

    <x-hero-divider/>

    <x-hero>
        <x-slot:header>
            Why SOAP?
        </x-slot:header>
        Spending time with God is the only way to truly become closer to Him. To
        read His words and to live by those words means you must understand what
        is being said. The SOAP method encourages that deeper dive into the word
        by slowing you down and allows you to digest and understand what is being
        said. SOAP can take as little as 15 minutes or as long as you need. We
        provide a toolkit to aid in your study of the Bible. You can share your
        studies with others and help spread the word to those who may not yet be
        saved.
    </x-hero>

    <x-hero-divider />


    <x-hero>
        <x-slot:header>
            What is SOAP?
        </x-slot:header>
        <div class="text-center space-y-6">
            <x-hero-body>
                <x-slot:title>S - Scripture</x-slot:title>
                <x-slot:subtitle>Write down your verse</x-slot:subtitle>
                The Holy Spirit works wonders for us every day. By writing the word it
                will help you memorize scripture and reveal more to you than simply
                reading it.
            </x-hero-body>

            <x-hero-body>
                <x-slot:title>O - Observation</x-slot:title>
                <x-slot:subtitle>What jumps out at you during your reading?</x-slot:subtitle>
                What jumps out at you during your reading?
                Try to figure out the who, what, where and when during your reading.
                Pull out words that repeat.
            </x-hero-body>

            <x-hero-body>
                <x-slot:title>A - Application</x-slot:title>
                <x-slot:subtitle>Write down your verse</x-slot:subtitle>
                How can you apply the verses to your life? Make it personal!
                What is God telling me? How can I use the lessons througout my life?
                What changes can I make to truly live as the word describes? What would
                my life look like? How can I use this to show others true and
                unconditional love and Grace?
            </x-hero-body>

            <x-hero-body>
                <x-slot:title>P - Prayer</x-slot:title>
                <x-slot:subtitle>Pray over God's words</x-slot:subtitle>
                Pray about what was revealed to you during this time. Confess any sins
                that may have been revealed during your study. Take the time to thank
                Him for his persistence to get to know you and all the blessings in your
                life.
            </x-hero-body>
        </div>
    </x-hero>

    <x-hero-divider :lastItem="true"/>
@endsection
