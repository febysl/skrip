<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Website Pengajuan Surat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
            *,
            ::after,
            ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }

            ::after,
            ::before {
                --tw-content: ''
            }

            :host,
            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                tab-size: 4;
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                font-feature-settings: normal;
                font-variation-settings: normal;
                -webkit-tap-highlight-color: transparent
            }

            body {
                margin: 0;
                line-height: inherit
            }

            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px
            }

            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-size: inherit;
                font-weight: inherit
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            b,
            strong {
                font-weight: bolder
            }

            code,
            kbd,
            pre,
            samp {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                font-feature-settings: normal;
                font-variation-settings: normal;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse
            }

            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit;
                font-feature-settings: inherit;
                font-variation-settings: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0
            }

            button,
            select {
                text-transform: none
            }

            [type=button],
            [type=reset],
            [type=submit],
            button {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none
            }

            :-moz-focusring {
                outline: auto
            }

            :-moz-ui-invalid {
                box-shadow: none
            }

            progress {
                vertical-align: baseline
            }

            ::-webkit-inner-spin-button,
            ::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            ::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            blockquote,
            dd,
            dl,
            figure,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            hr,
            p,
            pre {
                margin: 0
            }

            fieldset {
                margin: 0;
                padding: 0
            }

            legend {
                padding: 0
            }

            menu,
            ol,
            ul {
                list-style: none;
                margin: 0;
                padding: 0
            }

            dialog {
                padding: 0
            }

            textarea {
                resize: vertical
            }

            input::placeholder,
            textarea::placeholder {
                opacity: 1;
                color: #9ca3af
            }

            [role=button],
            button {
                cursor: pointer
            }

            :disabled {
                cursor: default
            }

            audio,
            canvas,
            embed,
            iframe,
            img,
            object,
            svg,
            video {
                display: block;
                vertical-align: middle
            }

            img,
            video {
                max-width: 100%;
                height: auto
            }

            [hidden] {
                display: none
            }

            *,
            ::before,
            ::after {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            .absolute {
                position: absolute
            }

            .relative {
                position: relative
            }

            .-left-20 {
                left: -5rem
            }

            .top-0 {
                top: 0px
            }

            .-bottom-16 {
                bottom: -4rem
            }

            .-left-16 {
                left: -4rem
            }

            .-mx-3 {
                margin-left: -0.75rem;
                margin-right: -0.75rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .mt-6 {
                margin-top: 1.5rem
            }

            .flex {
                display: flex
            }

            .grid {
                display: grid
            }

            .hidden {
                display: none
            }

            .aspect-video {
                aspect-ratio: 16 / 9
            }

            .size-12 {
                width: 3rem;
                height: 3rem
            }

            .size-5 {
                width: 1.25rem;
                height: 1.25rem
            }

            .size-6 {
                width: 1.5rem;
                height: 1.5rem
            }

            .h-12 {
                height: 3rem
            }

            .h-40 {
                height: 10rem
            }

            .h-full {
                height: 100%
            }

            .min-h-screen {
                min-height: 100vh
            }

            .w-full {
                width: 100%
            }

            .w-\[calc\(100\%\+8rem\)\] {
                width: calc(100% + 8rem)
            }

            .w-auto {
                width: auto
            }

            .max-w-\[877px\] {
                max-width: 877px
            }

            .max-w-2xl {
                max-width: 42rem
            }

            .flex-1 {
                flex: 1 1 0%
            }

            .shrink-0 {
                flex-shrink: 0
            }

            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .flex-col {
                flex-direction: column
            }

            .items-start {
                align-items: flex-start
            }

            .items-center {
                align-items: center
            }

            .items-stretch {
                align-items: stretch
            }

            .justify-end {
                justify-content: flex-end
            }

            .justify-center {
                justify-content: center
            }

            .gap-2 {
                gap: 0.5rem
            }

            .gap-4 {
                gap: 1rem
            }

            .gap-6 {
                gap: 1.5rem
            }

            .self-center {
                align-self: center
            }

            .overflow-hidden {
                overflow: hidden
            }

            .rounded-\[10px\] {
                border-radius: 10px
            }

            .rounded-full {
                border-radius: 9999px
            }

            .rounded-lg {
                border-radius: 0.5rem
            }

            .rounded-md {
                border-radius: 0.375rem
            }

            .rounded-sm {
                border-radius: 0.125rem
            }

            .bg-\[\#FF2D20\]\/10 {
                background-color: rgb(255 45 32 / 0.1)
            }

            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity))
            }

            .bg-gradient-to-b {
                background-image: linear-gradient(to bottom, var(--tw-gradient-stops))
            }

            .from-transparent {
                --tw-gradient-from: transparent var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
            }

            .via-white {
                --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)
            }

            .to-white {
                --tw-gradient-to: #fff var(--tw-gradient-to-position)
            }

            .stroke-\[\#FF2D20\] {
                stroke: #FF2D20
            }

            .object-cover {
                object-fit: cover
            }

            .object-top {
                object-position: top
            }

            .p-6 {
                padding: 1.5rem
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem
            }

            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem
            }

            .py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem
            }

            .pt-3 {
                padding-top: 0.75rem
            }

            .text-center {
                text-align: center
            }

            .font-sans {
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
            }

            .text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem
            }

            .text-sm\/relaxed {
                font-size: 0.875rem;
                line-height: 1.625
            }

            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem
            }

            .font-semibold {
                font-weight: 600
            }

            .text-black {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .underline {
                -webkit-text-decoration-line: underline;
                text-decoration-line: underline
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }

            .shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\] {
                --tw-shadow: 0px 14px 34px 0px rgba(0, 0, 0, 0.08);
                --tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .ring-transparent {
                --tw-ring-color: transparent
            }

            .ring-white\/\[0\.05\] {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.06));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.25));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .transition {
                transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms
            }

            .duration-300 {
                transition-duration: 300ms
            }

            .selection\:bg-\[\#FF2D20\] *::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white *::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .selection\:bg-\[\#FF2D20\]::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .hover\:text-black:hover {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .hover\:text-black\/70:hover {
                color: rgb(0 0 0 / 0.7)
            }

            .hover\:ring-black\/20:hover {
                --tw-ring-color: rgb(0 0 0 / 0.2)
            }

            .focus\:outline-none:focus {
                outline: 2px solid transparent;
                outline-offset: 2px
            }

            .focus-visible\:ring-1:focus-visible {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
            }

            @media (min-width: 640px) {
                .sm\:size-16 {
                    width: 4rem;
                    height: 4rem
                }

                .sm\:size-6 {
                    width: 1.5rem;
                    height: 1.5rem
                }

                .sm\:pt-5 {
                    padding-top: 1.25rem
                }
            }

            @media (min-width: 768px) {
                .md\:row-span-3 {
                    grid-row: span 3 / span 3
                }
            }

            @media (min-width: 1024px) {
                .lg\:col-start-2 {
                    grid-column-start: 2
                }

                .lg\:h-16 {
                    height: 4rem
                }

                .lg\:max-w-7xl {
                    max-width: 80rem
                }

                .lg\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr))
                }

                .lg\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr))
                }

                .lg\:flex-col {
                    flex-direction: column
                }

                .lg\:items-end {
                    align-items: flex-end
                }

                .lg\:justify-center {
                    justify-content: center
                }

                .lg\:gap-8 {
                    gap: 2rem
                }

                .lg\:p-10 {
                    padding: 2.5rem
                }

                .lg\:pb-10 {
                    padding-bottom: 2.5rem
                }

                .lg\:pt-0 {
                    padding-top: 0px
                }

                .lg\:text-\[\#FF2D20\] {
                    --tw-text-opacity: 1;
                    color: rgb(255 45 32 / var(--tw-text-opacity))
                }
            }

            @media (prefers-color-scheme: dark) {
                .dark\:block {
                    display: block
                }

                .dark\:hidden {
                    display: none
                }

                .dark\:bg-black {
                    --tw-bg-opacity: 1;
                    background-color: rgb(0 0 0 / var(--tw-bg-opacity))
                }

                .dark\:bg-zinc-900 {
                    --tw-bg-opacity: 1;
                    background-color: rgb(24 24 27 / var(--tw-bg-opacity))
                }

                .dark\:via-zinc-900 {
                    --tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)
                }

                .dark\:to-zinc-900 {
                    --tw-gradient-to: #18181b var(--tw-gradient-to-position)
                }

                .dark\:text-white\/50 {
                    color: rgb(255 255 255 / 0.5)
                }

                .dark\:text-white {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:text-white\/70 {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:ring-zinc-800 {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity))
                }

                .dark\:hover\:text-white:hover {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:hover\:text-white\/70:hover {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:hover\:text-white\/80:hover {
                    color: rgb(255 255 255 / 0.8)
                }

                .dark\:hover\:ring-zinc-700:hover {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-white:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity))
                }
            }
        </style>
    @endif
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .brand {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .background {
            background-image: url('img/brandgbk4.jpg');
            /* Menggunakan gambar logo sebagai background */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            /* Tambahkan efek gelap */
            z-index: 1;
        }

        .background h1,
        .background p {
            padding: 6px;
            position: relative;
            z-index: 2;
        }


        .background h1 {
            font-size: 48px;
            margin: 0;
        }

        .background p {
            font-size: 24px;
            margin: 10px 0;
        }

        /* Styling untuk Tombol Auth */
        .auth-buttons a {
            display: inline-block;
            margin: 0 5px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #4CAF50;
            background-color: #ffffff;
            border: 2px solid #4CAF50;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .auth-buttons a:hover {
            background-color: #4CAF50;
            color: #ffffff;
            box-shadow: 0px 4px 15px rgba(76, 175, 80, 0.5);
            transform: translateY(-3px);
        }

        .auth-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        /* Flex container untuk gambar dan deskripsi */
        .flex-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px 10px;
        }

        .flex-item {
            flex: 1;
            max-width: 500px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .flex-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .description-container {
            background-color: #E6F4EA;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: justify;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .description-container h1 {
            color: #1d4ed8;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .description-container p {
            color: #4b5563;
            font-size: 20px;
            line-height: 1.8;
            margin-top: 10px;
        }

        .box {
            background-color: rgb(226, 239, 247);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .box h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #3B82F6;
            /* Warna biru */
        }

        /* Cards section styling */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            margin: 50px;
        }

        .card-item {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            /* Memindahkan kartu sedikit ke bawah */
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
            border-left: 5px solid #3B82F6;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-item:hover {
            transform: translateY(-10px) scale(1.1);
            /* Membesarkan kartu dengan scale */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih jelas */
            background-color: #f0f4f8;
            /* Ubah latar belakang untuk efek hover */
        }

        .card-item .card-body {
            transition: color 0.3s ease;
            /* Animasi perubahan warna */
        }

        .card-item:hover .card-body h3 {
            color: #1d4ed8;
            /* Ubah warna judul saat hover */
        }

        .card-item:hover .card-body p {
            color: #555;
            /* Ubah warna deskripsi saat hover */
        }

        /* Hover effect untuk gambar */
        .flex-item:hover {
            transform: scale(1.05);
            /* Membesarkan gambar saat hover */
        }

        /* Styling untuk gambar dalam card */
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 4px solid #E6F4EA;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .card-body h3 {
            margin-bottom: 10px;
            color: #3B82F6;
            font-weight: 600;
        }

        .card-body p {
            margin: 0;
            color: #333;
            line-height: 1.6;
        }

        /* Animasi untuk munculnya kartu */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Penundaan animasi pada setiap kartu */
        .card-item:nth-child(1) {
            animation-delay: 0.2s;
        }

        .card-item:nth-child(2) {
            animation-delay: 0.4s;
        }

        .card-item:nth-child(3) {
            animation-delay: 0.6s;
        }

        .card-item:nth-child(4) {
            animation-delay: 0.8s;
        }

        .card-item:nth-child(5) {
            animation-delay: 1s;
        }

        /* Hover effect untuk kartu */
        .card-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Footer Styling */
.footer {
    background-color: #2c3e50;
    color: white;
    padding: 40px 20px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}

/* .footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-logo .logo {
    width: 150px;
    height: auto;
    object-fit: contain;
    margin-bottom: 20px;
    display: block;
} */

.footer-content {
    display: flex;
    justify-content: space-between;
    gap: 40px;
    text-align: left;
    flex-wrap: wrap;
    margin-top: 20px;
}

.footer-address, .footer-contact {
    flex: 1;
    min-width: 250px;
    margin-top: 10px;

}

.footer-address h4, .footer-contact h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #ecf0f1;
}

.footer-address p, .footer-contact p {
    font-size: 14px;
    line-height: 1.6;
    color: #bdc3c7;
}

.social-links {
    margin-top: 10px;
}

.social-icon {
    color: #ecf0f1;
    font-size: 20px;
    margin: 0 10px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.social-icon:hover {
    transform: scale(1.1);
}
.footer-container {
    display: flex;
    justify-content: space-between; /* Meratakan elemen secara horizontal */
    align-items: start; /* Selaraskan elemen secara vertikal */
    text-align: start;
    gap: 100px; /* Jarak antar elemen */
    max-width: 1200px; /* Batas lebar untuk presisi */
    margin: 0 auto; /* Pusatkan footer di tengah layar */
    padding: 10px;

}



.footer-logo {
    display: flex;
    align-items: center;
    text-align: start;
    gap: 5px;
    margin-right: 15px;
}


.footer-bottom {
    margin-top: 30px;
    background-color: #34495e;
    padding: 20px;
}

.footer-bottom p {
    font-size: 14px;
    color: #bdc3c7;
}

/* Responsif untuk tampilan mobile */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: row !important; /* Mengubah menjadi kolom */

    }

    .footer-content {
        text-align: center;
        flex-direction: column;
        gap: 20px;
    }


    .footer-address, .footer-contact {
        width: 100%;
    }
}


        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .cards-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .flex-container {
                flex-direction: column;
                gap: 30px;
            }
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                gap: 30px;
            }
        }

        .custom-hr {
            border: 1px solid white;
            /* Mengubah warna garis menjadi putih */
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div>
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed top-0 left-0 w-full z-50 shadow">
            <div>
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo Section -->
                        <div class="flex items-center">

                            <!-- Logo -->
                            <img src="img/logo.png" alt="Logo Desa Gebangkerep" class="w-20 h-auto sm:w-24 lg:w-32">
                            <span class="ml-2 text-gray-800 text-sm sm:text-sm lg:text-base ">
                                Desa Gebangkerep<br>Kab Pekalongan
                            </span>

                        </div>

                        <!-- Main Navigation Links (Desktop) -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                            <x-nav-link :href="route('data.jenis')" :active="request()->routeIs('data.jenis')">
                                {{ __('Jenis Surat') }}
                            </x-nav-link>
                            <x-nav-link :href="route('pengajuan.pelayanan')" :active="request()->routeIs('pengajuan.pelayanan')">
                                {{ __('Pelayanan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('pengajuan.status')" :active="request()->routeIs('pengajuan.status')">
                                {{ __('Status') }}
                            </x-nav-link>
                            <x-nav-link :href="route('surat.suratMasuk')" :active="request()->routeIs('surat.suratMasuk')">
                                {{ __('Surat Masuk') }}
                            </x-nav-link>
                        </div>

                        <div class="auth-buttons flex justify-center gap-4 sm:gap-6 md:gap-8 flex-wrap">
                            @if (Route::has('login'))
                                <nav class="flex flex-wrap justify-center gap-3">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="btn-auth bg-white text-green-600 border-2 border-green-600 rounded-full px-6 py-2 text-base font-bold hover:bg-green-600 hover:text-white shadow-lg transform hover:-translate-y-1 transition
                                       sm:text-sm sm:px-5 sm:py-2 md:text-base md:px-6 md:py-3">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="btn-auth bg-white text-green-600 border-2 border-green-600 rounded-full px-6 py-2 text-base font-bold hover:bg-green-600 hover:text-white shadow-lg transform hover:-translate-y-1 transition
                                       sm:text-sm sm:px-5 sm:py-2 md:text-base md:px-6 md:py-3">
                                            Log in
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="btn-auth bg-white text-green-600 border-2 border-green-600 rounded-full px-6 py-2 text-base font-bold hover:bg-green-600 hover:text-white shadow-lg transform hover:-translate-y-1 transition
                                           sm:text-sm sm:px-5 sm:py-2 md:text-base md:px-6 md:py-3">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div>





                        <!-- Mobile Hamburger Menu -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Menu (Mobile) -->
                <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('data.jenis')" :active="request()->routeIs('data.jenis')">
                            {{ __('Jenis Surat') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('pengajuan.pelayanan')" :active="request()->routeIs('pengajuan.pelayanan')">
                            {{ __('Pelayanan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('pengajuan.status')" :active="request()->routeIs('pengajuan.status')">
                            {{ __('Status') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('surat.suratMasuk')" :active="request()->routeIs('surat.suratMasuk')">
                            {{ __('Surat Masuk') }}
                        </x-responsive-nav-link>
                    </div>


                </div>


            </div>
        </nav>


        {{-- @include('components.navbarNolog') --}}
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="background">
                <h1>Selamat Datang</h1>
                <p>Website Pengajuan Surat<br>Desa Gebangkerep</p>
            </div>

        </div>
    </div>
    </div>

      <!-- Flexbox untuk gambar dan deskripsi -->
      <div class="content-wrapper">
        <div class="container mx-auto p-8">
            <div class="flex-container">
                <!-- Gambar -->
                <div class="flex-item image-container">
                    <img src="img/gbk.png" alt="Desa Gebangkerep" class="w-full h-auto rounded-lg">
                </div>

    <div class="flex-item description-container">
        <h1>Website Pengajuan Surat Online</h1>
        <p>
            Website pengajuan surat online adalah layanan digital yang dirancang untuk memudahkan
            masyarakat dalam
            mengurus berbagai kebutuhan administrasi, seperti pembuatan surat keterangan domisili,
            surat pengantar,
            surat izin, dan dokumen resmi lainnya. Melalui platform ini, pengguna dapat dengan cepat
            mengisi formulir
            pengajuan, mengunggah dokumen yang diperlukan, dan memantau prosesnya tanpa harus datang
            langsung ke
            kantor desa.
        </p>
    </div>
    </div>
    </div>
    </div>

    <div class="container mx-auto p-8">
        <div
            class="box flex flex-col bg-gradient-to-r from-blue-300 via-white to-blue-400 rounded-xl shadow-xl p-8 border border-[#E6F4EA]">
            <h2 class="text-3xl font-extrabold mb-6 text-blue-600 text-center">Langkah-langkah Pengajuan Surat
            </h2>
            <hr class="custom-hr">
            <div class="cards-container">
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-user-circle card-icon"></i> <!-- Ikon untuk step 1 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">1. Registrasi atau Login</h3>
                        <p class="text-lg">Jika Anda belum terdaftar, lakukan registrasi terlebih dahulu atau
                            login jika sudah memiliki akun.</p>
                    </div>
                </div>
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-envelope card-icon"></i> <!-- Ikon untuk step 2 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">2. Pilih Jenis Surat</h3>
                        <p class="text-lg">Pilih jenis surat yang akan diajukan pada halaman Jenis Surat dan perhatikan
                            petunjuk yang diperlukan untuk pengajuan surat.</p>
                    </div>
                </div>
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-edit card-icon"></i> <!-- Ikon untuk step 3 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">3. Isi Formulir Pengajuan</h3>
                        <p class="text-lg">Isi formulir dengan data yang diperlukan dan unggah dokumen yang
                            diminta.</p>
                    </div>
                </div>
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-check-circle card-icon"></i> <!-- Ikon untuk step 4 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">4. Verifikasi dan Proses</h3>
                        <p class="text-lg">Petugas yang bertanggung jawab akan memverifikasi data Anda, kemudian surat
                            akan diproses.
                        </p>
                    </div>
                </div>
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-download card-icon"></i> <!-- Ikon untuk step 5 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">5. Unduh Surat</h3>
                        <p class="text-lg">Setelah disetujui, Anda dapat mengunduh surat yang sudah jadi
                            langsung dari website.</p>
                    </div>
                </div>
                <div class="card-item animate-card">
                    <div class="card-header">
                        <i class="fas fa-exclamation-circle card-icon"></i> <!-- Ikon untuk step 6 -->
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-semibold text-blue-500">6. Konfirmasi Apabila Terjadi Kesalahan
                        </h3>
                        <p class="text-lg">Jika ada kesalahan dalam pengisian data atau proses pengajuan,
                            lakukan konfirmasi kepada pihak desa untuk perbaikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo p-3">
                <img src="img/logo.png" alt="Logo Desa Gebangkerep" class="logo">
                <div class="text-group text-left mb-2">
                    <h3 class="text-lg font-semibold leading-tight">Desa Gebangkerep</h3>
                    <h3 class="text-lg font-semibold leading-tight">Kab Pekalongan</h3>
                </div>
            </div>
            <div class="ml-3">
                <div class="footer-address">
                    <h4>Alamat Balaidesa</h4>
                    <p>Desa Gebangkerep, Kecamatan Sragi, Kabupaten Pekalongan, Provinsi Jawa Tengah, Indonesia</p>
                </div>
                <div class="footer-contact">
                    <h4>Kontak Kami</h4>
                    <p>Telp: (021) 123-4567</p>
                    <p>Email: kontak@desagebankerep.id</p>
                    <div class="social-links">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>

            </div>
            </div>

        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Desa Gebangkerep.</p>
        </div>
    </footer>
    </div>




</body>

</html>
