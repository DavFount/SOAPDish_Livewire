<div class="inline-flex ml-24" x-data="{modalShow: false}">
    <button @click="modalShow = true" type="button" class="text-xs  text-blue-500">Markdown Enabled</button>
    <div x-show="modalShow"
         x-transition:enter="motion-safe:ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="motion-safe:ease-out duration-300"
         x-transition:leave-start="opacity-0 scale-90"
         x-transition:leave-end="opacity-100 scale-100"
         class="relative z-10"
         aria-labelledby="markdown-examples"
         role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div @click.outside="modalShow = false"
                     class="relative transform overflow-hidden rounded-lg bg-gray-50 dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                        <button @click="modalShow = false" type="button"
                                class="rounded-md bg-gray-50 text-gray-400 hover:text-gray-500 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <span class="sr-only">Close</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <div class="text-center">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50" id="modal-title">
                                Markdown Cheat
                                Sheet</h3>
                        </div>
                        <table
                            class="table-auto mt-2 mx-auto text-gray-900 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-separate border-spacing-2 custom-shadow rounded-xl">
                            <thead>
                            <tr>
                                <th class="text-center border-b border-gray-500">Markdown</th>
                                <th class="text-center border-b border-gray-500">Output</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td># Heading 1</td>
                                <td class="prose dark:prose-invert py-2"><h1>Heading 1</h1></td>
                            </tr>
                            <tr>
                                <td>## Heading 2</td>
                                <td class="prose dark:prose-invert py-2"><h2>Heading 2</h2></td>
                            </tr>
                            <tr>
                                <td>### Heading 3</td>
                                <td class="prose dark:prose-invert py-2"><h3>Heading 3</h3></td>
                            </tr>
                            <tr>
                                <td>#### Heading 4</td>
                                <td class="prose dark:prose-invert py-2"><h4>Heading 4</h4></td>
                            </tr>
                            <tr>
                                <td>*Italic*</td>
                                <td class="prose dark:prose-invert py-2"><em>Italic</em></td>
                            </tr>
                            <tr>
                                <td>**Bold**</td>
                                <td class="prose dark:prose-invert py-2"><strong>Bold</strong></td>
                            </tr>
                            <tr>
                                <td>***Important***</td>
                                <td class="prose dark:prose-invert py-2"><strong><em>Important</em></strong></td>
                            </tr>
                            <tr>
                                <td>
                                    * Unordered <br/>
                                    * List
                                </td>
                                <td class="prose dark:prose-invert py-2">
                                    <ul>
                                        <li>Unordered</li>
                                        <li>List</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    1. Ordered <br/>
                                    2. List
                                </td>
                                <td class="prose dark:prose-invert py-2">
                                    <ol>
                                        <li>Ordered</li>
                                        <li>List</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Horizontal <br/>
                                    --- <br/>
                                    Rules <br/>
                                </td>
                                <td class="prose dark:prose-invert py-2">
                                    Horizontal
                                    <hr/>
                                    Rules
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <a href="https://www.markdownguide.org/cheat-sheet/" target="_blank"
                           class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:text-sm">GoTo:
                            Markdown Cheat Sheet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
