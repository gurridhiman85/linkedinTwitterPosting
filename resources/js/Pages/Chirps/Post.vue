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


        <div class=" left-0 w-full h-full flex items-center justify-center ">
          <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <form @submit.prevent="form.post(route('twitter.postOnTwitter'), { onSuccess: () => form.reset() })">
              <textarea
                v-model="form.message"
                placeholder="What's on your mind?" rows="10"
                class="block w-full resize-none border-blue-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                style="height: 150px;"
              ></textarea>
              <InputError :message="form.errors.message" class="mt-2" />
              <PrimaryButton class="mt-4">Post</PrimaryButton>
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

