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

    // Load user data from localStorage during store initialization
    const savedUser = JSON.parse(localStorage.getItem('authUser'));
    if (savedUser) {
        user.value = savedUser;
    }

    const getAuthUser = async () => {
        await axios.get('/api/profile')
            .then((response) => {
                user.value = response.data;
                localStorage.setItem('authUser', JSON.stringify(response.data));
            });

    };

    const setAuthUser = (data) => {
        user.value = data;
        localStorage.setItem('authUser', JSON.stringify(data));
    };

    return { user, getAuthUser, setAuthUser };
});
