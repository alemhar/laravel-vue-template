import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useAuthUserStore = defineStore('AuthUserStore', () => {
    const user = ref({
        name: '',
        email: '',
        role: '',
        avatar: '',
    });

    const getAuthUser = async () => {
        await axios.get('/api/profile')
            .then((response) => {
                user.value = response.data;
            });
    };

    const setAuthUser = (data) => {
        console.log('setAuthUser', data);
        user.value = data;
    };

    return { user, getAuthUser, setAuthUser };
});
