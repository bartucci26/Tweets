<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Tweets
            </h2>
        </template>
        <TweetsCreate></TweetsCreate>

        <div class="py-12">
          <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
              <div v-for="tweet in tweets" v-bind:key="tweet.id" class="flex items-center space-x-4 bg-white
              overflow-hidden rounded rounded-b-none border-b-2 border-gray-200 py-6 px-4">
              <img class="h-16 w-16 object-cover rounded-full" :src="tweet.user.profile_photo_url" alt="">
                <div class="flex flex-col w-2/3">
                <div >
                    <a class="text-sm text-gray-900 font-bold hover:text-blue-400">
                        {{tweet.user.name}}
                    </a>
                    <span class="font-thin text-gray-400"> at {{tweet.created_at}}</span>
                </div>
                <div class="text-sm text-gray-400 font-thin">{{tweet.content}}</div>
                </div>
                <inertia-link class="bg-white text-blue-500 cursor-pointer px-5 py-2 hover:text-white border border-blue-500
                 leading-tight hover:bg-blue-500 rounded-full font-extrabold transition-all duration-300 preserve-scroll">Follow</inertia-link>
              </div>

          </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import TweetsCreate from '@/Pages/Tweets/Create'

    export default {

        components: {
            AppLayout,
            TweetsCreate,
       
        },
        props: {
            tweets: Array
        }
        
    }
</script>
