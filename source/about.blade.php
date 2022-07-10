---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <h1>About</h1>
    <p>
        My goal is to solve one Data Structure and Algorithm related problem per day. This website is a way to 
        keep track of my progress and also share my solutions. I will use python to solve the problems.
    </p>

    <p>
        If you have any questions, feel free to contact.
    </p>

    <form action="https://formspree.io/f/xeqnbroz" class="mb-12" method="POST">
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full md:w-1/2 mb-6 md:mb-0 px-3">
                <label class="block mb-2 text-gray-800 text-sm font-semibold" for="contact-name">
                    Name
                </label>

                <input
                    type="text"
                    id="contact-name"
                    placeholder="Jane Doe"
                    name="name"
                    class="block w-full border shadow rounded-lg outline-none mb-2 px-4 py-3"
                    required
                >
            </div>

            <div class="w-full px-3 md:w-1/2">
                <label class="block text-gray-800 text-sm font-semibold mb-2" for="contact-email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="contact-email"
                    placeholder="email@domain.com"
                    name="email"
                    class="block w-full border shadow rounded-lg outline-none mb-2 px-4 py-3"
                    required
                >
            </div>
        </div>

        <div class="w-full mb-12">
            <label class="block text-gray-800 text-sm font-semibold mb-2" for="contact-message">
                Message
            </label>

            <textarea
                id="contact-message"
                rows="6"
                name="message"
                class="block w-full border shadow rounded-lg outline-none appearance-none mb-2 px-4 py-3"
                placeholder="A lovely message here."
                required
            ></textarea>
        </div>

        <div class="flex justify-end w-full">
            <input
                type="submit"
                value="Submit"
                class="block bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-semibold leading-snug tracking-wide uppercase shadow rounded-lg cursor-pointer px-6 py-3"
            >
        </div>
    </form>
@endsection
