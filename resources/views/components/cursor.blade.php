<div class="absolute w-[30px] h-[30px] pointer-events-none z-[999999999999999]">
    <div
        x-data="Components.cursor()"
        class=" fixed block w-10 h-10 border pointer-events-none opacity-50 rounded-[50%] border-solid border-white border-body-text left-0 -top-px">
        <div class="loader">
            <svg
                class="opacity-0 duration-300 ease-in-out"
                version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                xml:space="preserve">
						<path
                            d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25"
                                              to="360 25 25" dur="0.6s" repeatCount="indefinite"></animateTransform>
                        </path>
					</svg>
        </div>
    </div>
</div>
