<div
    class='bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow'>
    <div class="flex items-center space-x-3 font-semibold text-gray-900 dark:text-gray-300 text-xl leading-8">
        <span class="text-gray-500">
            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </span>
        <span>Followers</span>
    </div>
    <div class="grid sm:grid-cols-1 lg:grid-cols-3">
        @foreach($follower as $followerUser)
            <x-profile.friend-item :name="$followerUser->name"
                                   :profile="route('community.show', ['user' => $followerUser])"
                                   :avatar="$followerUser->avatarUrl()"/>
        @endforeach
    </div>
    <div>
        {{  $follower->links() }}
    </div>
</div>
