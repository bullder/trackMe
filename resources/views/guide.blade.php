<div class="bg-white rounded-top shadow-sm mb-4 rounded-bottom">

    <div class="row g-0">
        <div class="col col-lg-7 mt-6 p-4">

            <h2 class="text-body-emphasis fw-light lh-lg">
                Hello, It’s Great to See You!
            </h2>

            <p class="text-balance">
                It is a fascinating project, and it’s easy enough to use that you might wish to dive right in.
                You are minutes away from creativity than ever before. Enjoy!
            </p>
        </div>
        <div class="d-none d-lg-block col align-self-center text-end text-muted p-4 opacity-25">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" role="img" width="6em" height="100%" viewBox="0 0 100 100">
                <path d="M86.55 30.73c-11.33 10.72-27.5 12.65-42.3 14.43-10.94 1.5-23.3 3.78-30.48 13.04-6.2 8.3-4.25 20.3 2.25 27.8 1.35 2.03 5.7 5.7 6.38 5.3-5.96-8.42-5.88-21.6 2.6-28.4 8.97-7.52 21.2-7.1 32.03-9.7 6.47-1.23 13.3-3.5 19.2-5.34-8.3 7.44-19.38 10.36-29.7 13.75-8.7 3.08-17.22 10.23-17.45 20.1-.17 6.8 3.1 14.9 10.06 17.07 18.56 4.34 39.14-3.16 50.56-18.4 12.7-16.12 13.75-40.2 2.43-57.33-1.33 2.9-3.28 5.5-5.58 7.7z"/>
                <path d="M0 49.97c-.14 4.35 1.24 13.9 2.63 14.64 1.2-11.48 10.2-20.74 20.83-24.47 17.9-7.06 38.75-3.1 55.66-13.18 5.16-2.3 9.28-9.48 4.36-14.1-2.16-1.76-5.9-5.75-3.7-.72.83 6.22-5.47 10.06-10.63 11.65-10.9 3.34-22.46 3-33.62 4.93-1.9.32-5.9 1.2-2.07-.6 10.52-5.02 23.57-4.38 32.6-12.5 4.8-3.75 2.77-11.16-2.4-13.4C57.4-.35 50.3-.35 43.63.35c-19.85 2.3-37.3 17.7-42.05 37.1C.52 41.57 0 45.77 0 49.97z"/>
            </svg>
        </div>
    </div>

    <div class="row bg-light m-0 p-md-4 p-3 border-top rounded-bottom g-md-5 text-balance">

        <div class="col-md-12 my-2">
            <h3 class="text-muted fw-light lh-lg d-flex align-items-center">
                <x-orchid-icon path="bs.book"/>

                <span class="ms-3 text-body-emphasis">How to install tracker</span>
            </h3>
            <p class="ms-md-5 ps-md-1">
                Simply copy the following code and insert it into your site before the closing &lt;/body&gt; tag.
                <br/>
                <code>
                    &lt;script&gt;window.track = &#039;{{ url('/') }}&#039;;&lt;/script&gt;<br/>
                    &lt;script src=&#039;{{ url('/track.js') }}&#039;&gt;&lt;/script&gt;
                </code>
            </p>
        </div>

    </div>
</div>
