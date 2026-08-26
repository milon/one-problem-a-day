---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <div class="max-w-3xl">
        <p class="mb-2 font-mono text-xs font-semibold uppercase tracking-[0.2em] text-brand-600 dark:text-blue-400">About the project</p>
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl dark:text-white">One problem, every day.</h1>
        <div class="prose-content mt-7">
            <p>
                My goal is to solve one data structures and algorithms problem per day. This site keeps track of that progress and shares the Python solutions along the way.
            </p>
            <p>
                Have a question or spotted something that could be improved? Send me a message.
            </p>
        </div>

        <form action="{{ $page->contactFormUrl }}" class="mt-10 rounded-2xl border border-slate-200 bg-white p-6 shadow-panel dark:border-slate-800 dark:bg-slate-900 sm:p-8" method="POST">
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300" for="contact-name">
                    Name
                    </label>
                    <input type="text" id="contact-name" placeholder="Jane Doe" name="name" class="block w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-slate-950 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100 dark:border-slate-700 dark:bg-slate-950 dark:text-white" required>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300" for="contact-email">
                        Email address
                    </label>
                    <input type="email" id="contact-email" placeholder="email@domain.com" name="email" class="block w-full rounded-lg border border-slate-200 bg-white px-4 py-3 text-slate-950 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100 dark:border-slate-700 dark:bg-slate-950 dark:text-white" required>
                </div>
            </div>

            <div class="mt-5">
                <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300" for="contact-message">Message</label>
                <textarea id="contact-message" rows="6" name="message" class="block w-full resize-y rounded-lg border border-slate-200 bg-white px-4 py-3 text-slate-950 outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100 dark:border-slate-700 dark:bg-slate-950 dark:text-white" placeholder="Your message..." required></textarea>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="rounded-lg bg-brand-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-brand-700">Send message</button>
            </div>
        </form>
    </div>
@endsection
