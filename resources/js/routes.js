import Gallery from './components/Gallery.vue';
import Tag from './components/Tag.vue';
import AddPhoto from "./components/AddPhoto";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Gallery
    },
    {
        name: 'add-tags',
        path: '/add-tags',
        component: Tag
    },
    {
        name: 'add-photo',
        path: '/add-photo',
        component: AddPhoto
    },

];
