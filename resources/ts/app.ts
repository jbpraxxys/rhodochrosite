import "./bootstrap";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import UserLayout from "@/Layouts/UserLayout.vue";

import VButton from "@/Pages/User/Components/Buttons/VButton.vue";
import VBackButton from "@/Pages/User/Components/Buttons/VBackButton.vue";

import VCheckbox from "@/Pages/User/Components/Inputs/VCheckbox.vue";
import VDatePicker from "@/Pages/User/Components/Inputs/VDatePicker.vue";
import VTextInput from "@/Pages/User/Components/Inputs/VTextInput.vue";
import VPasswordInput from "@/Pages/User/Components/Inputs/VPasswordInput.vue";
import VSelector from "@/Pages/User/Components/Inputs/VSelector.vue";

import VConfirmationModal from "./Pages/User/Components/Modals/VConfirmationModal.vue";
import VDeleteModal from "./Pages/User/Components/Modals/VDeleteModal.vue";
import VDialogModal from "./Pages/User/Components/Modals/VDialogModal.vue";
import VSuccessModal from "./Pages/User/Components/Modals/VSuccessModal.vue";
import CalculatorModal from "./Pages/User/Components/Modals/CalculatorModal.vue";

// Design Components
import ServiceCard from "./Pages/User/Components/Cards/ServiceCard.vue";
import ValuesCard from "./Pages/User/Components/Cards/ValuesCard.vue";
import BenefitCard from "./Pages/User/Components/Cards/BenefitCard.vue";
import SpecialtyCard from "./Pages/User/Components/Cards/SpecialtyCard.vue";
import ArticleCard from "./Pages/User/Components/Cards/ArticleCard.vue";
import CareerCard from "./Pages/User/Components/Cards/CareerCard.vue";
import OfferCard from "./Pages/User/Components/Cards/OfferCard.vue";
import TeamCard from "./Pages/User/Components/Cards/TeamCard.vue";
import ImageText from "./Pages/User/Components/Sections/ImageText.vue";
import ContactForm from "./Pages/User/Components/Sections/ContactForm.vue";
import CareerForm from "./Pages/User/Components/Sections/CareerForm.vue";

//Section Components
import GeneralBanner from "./Pages/User/Components/Sections/GeneralBanner.vue";
import OffsetBanner from "./Pages/User/Components/Sections/OffsetBanner.vue";
import GenericBlock from "./Pages/User/Components/Sections/GenericBlock.vue";
import OfferBlock from "./Pages/User/Components/Sections/OfferBlock.vue";
import SpecialtyBlock from "./Pages/User/Components/Sections/SpecialtyBlock.vue";
import ContactFrame from "./Pages/User/Components/Sections/ContactFrame.vue";
import ImageTextFrame from "./Pages/User/Components/Sections/ImageTextFrame.vue";
import BenefitBlock from "./Pages/User/Components/Sections/BenefitBlock.vue";
import TextWithMap from "./Pages/User/Components/Sections/TextWithMap.vue";
import TeamFrame from "./Pages/User/Components/Sections/TeamFrame.vue";
import YoutubeEmbed from "./Pages/User/Components/Sections/YoutubeEmbed.vue";
import VPagination from "./Pages/User/Components/Partials/VPagination.vue";

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({
                methods: { route },
                components: {
                    Head,
                    Link,
                    UserLayout,
                    VButton,
                    VBackButton,
                    VCheckbox,
                    VDatePicker,
                    VTextInput,
                    VPasswordInput,
                    VSelector,
                    VConfirmationModal,
                    VDeleteModal,
                    VDialogModal,
                    VSuccessModal,
                    CalculatorModal,
                    ServiceCard,
                    ValuesCard,
                    ImageText,
                    BenefitCard,
                    SpecialtyCard,
                    ContactForm,
                    CareerForm,
                    OfferCard,
                    ArticleCard,
                    CareerCard,
                    GeneralBanner,
                    OffsetBanner,
                    GenericBlock,
                    OfferBlock,
                    SpecialtyBlock,
                    ContactFrame,
                    ImageTextFrame,
                    BenefitBlock,
                    TextWithMap,
                    TeamCard,
                    TeamFrame,
                    YoutubeEmbed,
                    VPagination
                }
            })
            .mount(el)
    },
})