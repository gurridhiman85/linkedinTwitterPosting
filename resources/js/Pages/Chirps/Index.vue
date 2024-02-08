<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
//import VueCookies from 'vue-cookies';

//const twr = $cookies.get('twr');
const form = useForm({
    message: '',
});

defineProps({
    lkd: '',
    twr: '',
});


</script>



<template>
    <Head title="Content" />
    <AuthenticatedLayout>
      <div class="mx-auto px-4 sm:px-6 lg:px-8 flex">
        <!-- Sidebar -->
        <div class="w-1/6  p-4">
          <!-- Vertical Nav Links -->
          <nav>
            <ul>
              <li><a class="nav-link active" href="/chirps">Create</a></li>
              <li><a class="nav-link" href="/calandar"><i class="fas fa-calendar"></i> Calendar</a></li>
              <!-- Add more links as needed -->
            </ul>
          </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 sm:p-6 lg:p-8">

          <!-- Button to open the popup -->
          <div class="text-right">
            <a href="/posts" v-if="lkd || twr" class="bg-blue-500 text-white py-2 px-4 rounded-lg"> Post Your Thoughts </a>
            <a v-else href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=86temmgod1v98l&redirect_uri=https://technosharks.com/linkedin/public/auth/linkedin/callback&state=foobar&scope=openid%20profile%20w_member_social%20email%20r_organization_social" class="bg-blue-500 text-white py-2 px-4 rounded-lg mr-2">Connect to Linkedin</a>

            <button  class="d-none" v-if="twr"></button>
            <a v-else href="https://twitter.com/i/oauth2/authorize?response_type=code&client_id=eFRFU3JLZVdaX3RkMHppUUdYX0M6MTpjaQ&redirect_uri=https://technosharks.com/linkedin/public/auth/callback/twitter&scope=tweet.read%20users.read%20offline.access%20tweet.write&state=state&code_challenge=challenge&code_challenge_method=plain" class="bg-blue-500 text-white py-2 px-4 rounded-lg ml-3">Connect to Twitter</a>
        </div>

          <div class="container mx-auto flex">
            <!-- First 3-column block -->
            <div class="w-1/5 mr-4 mb-4">
              <div class="border  rounded-lg">
                <a href=""><img src="/images/Frame.png" alt="Image 1" class="w-full h-auto rounded" />
                <div class="p-4 bg-white">
                  <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra arcu laoreet auctor bibendum. Maecenas id viverra turpis. Nulla auctor nisl id mollis luctus.</p>
                </div>
                </a>
              </div>
            </div>

            <!-- Second 3-column block -->
            <div class="w-1/5 mb-4">
              <div class="border rounded-lg">
                <a href=""><img src="/images/Frame2.png" alt="Image 2" class="w-full h-auto rounded" />
                <div class="p-4 bg-white">
                  <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra arcu laoreet auctor bibendum. Maecenas id viverra turpis. Nulla auctor nisl id mollis luctus.</p>
                </div></a>
              </div>
            </div>

          </div>

        </div>


        <div v-if="showPopup" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
          <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <form @submit.prevent="form.post(route('linkedin.postOnlinkedin'), { onSuccess: () => form.reset() })">
              <textarea
                v-model="form.message"
                placeholder="What's on your mind?" rows="10"
                class="block w-full resize-none border-blue-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                style="height: 150px;"
              ></textarea>
              <InputError :message="form.errors.message" class="mt-2" />
              <PrimaryButton class="mt-4">Post</PrimaryButton>
              <PrimaryButton @click="closePopup" class="mt-4 ml-4">Close Popup</PrimaryButton>
            </form>
          </div>
        </div>

        <div v-if="showPopup2" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
          <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <form @submit.prevent="form.post(route('twitter.postOnTwitter'), { onSuccess: () => form.reset() })">
              <textarea
                v-model="form.message"
                placeholder="What's on your mind to post on twitter?" rows="10"
                class="block w-full resize-none border-blue-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                style="height: 150px;"
              ></textarea>
              <InputError :message="form.errors.message" class="mt-2" />
              <PrimaryButton class="mt-4">Post</PrimaryButton>
              <PrimaryButton @click="closePopup2" class="mt-4 ml-4">Close Popup</PrimaryButton>
            </form>
          </div>
        </div>

      </div><!--end div-->
    </AuthenticatedLayout>
  </template>



<style scoped>

.nav-link {
  display: block;
  padding: 8px 12px;
  text-decoration: none;
  color: inherit;
}


.nav-link.active {
  background-color: #e0e7ff;
  border-radius: 4px;
}

.d-none{
    display: none;
}
</style>

<script>
    export default {

        data() {
            return {
                showPopup: false,
                showPopup2: false
            };
        },
        methods: {
            openPopup() {
                this.showPopup = true;
            },
            closePopup() {
                this.showPopup = false;
            },
            openPopup2() {
                this.showPopup = true;
            },
            closePopup2() {
                this.showPopup = false;
            }
        }

    };
</script>

