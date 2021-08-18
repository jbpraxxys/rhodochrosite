<template>
  <div class="relative h-screen flex overflow-hidden bg-white dark:bg-gray-800">
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog
        as="div"
        class="fixed inset-0 flex z-40 lg:hidden"
        @close="sidebarOpen = false"
      >
        <TransitionChild
          as="template"
          enter="transition-opacity ease-linear duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="transition-opacity ease-linear duration-300"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>
        <TransitionChild
          as="template"
          enter="transition ease-in-out duration-300 transform"
          enter-from="-translate-x-full"
          enter-to="translate-x-0"
          leave="transition ease-in-out duration-300 transform"
          leave-from="translate-x-0"
          leave-to="-translate-x-full"
        >
          <div
            class="
              relative
              flex-1 flex flex-col
              max-w-xs
              w-full
              pt-5
              pb-4
              bg-white
            "
          >
            <TransitionChild
              as="template"
              enter="ease-in-out duration-300"
              enter-from="opacity-0"
              enter-to="opacity-100"
              leave="ease-in-out duration-300"
              leave-from="opacity-100"
              leave-to="opacity-0"
            >
              <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button
                  class="
                    ml-1
                    flex
                    items-center
                    justify-center
                    h-10
                    w-10
                    rounded-full
                    focus:outline-none
                    focus:ring-2
                    focus:ring-inset
                    focus:ring-white
                  "
                  @click="sidebarOpen = false"
                >
                  <span class="sr-only">Close sidebar</span>
                  <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <div class="flex-shrink-0 flex items-center px-4">
              <img class="h-8 w-auto" src="/images/logo.png" alt="PRAXXYS" />
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
              <nav class="px-2">
                <div class="space-y-1">
                  <Link
                    :key="item.name"
                    :href="item.href"
                    :class="[
                      isCurrentUrl(item.href)
                        ? 'bg-gray-100 text-gray-900'
                        : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50',
                      'group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                  >
                    <component
                      :is="item.icon"
                      :class="[
                        isCurrentUrl(item.href)
                          ? 'text-gray-500'
                          : 'text-gray-400 group-hover:text-gray-500',
                        'mr-3 flex-shrink-0 h-6 w-6',
                      ]"
                      aria-hidden="true"
                    />
                    {{ item.name }}
                  </Link>
                </div>
                <div class="mt-8">
                  <h3
                    class="
                      px-3
                      text-xs
                      font-semibold
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                    id="mobile-teams-headline"
                  >
                    Teams
                  </h3>
                  <div
                    class="mt-1 space-y-1"
                    role="group"
                    aria-labelledby="mobile-teams-headline"
                  >
                    <a
                      v-for="team in teams"
                      :key="team.name"
                      :href="team.href"
                      class="
                        group
                        flex
                        items-center
                        px-3
                        py-2
                        text-base
                        leading-5
                        font-medium
                        text-gray-600
                        rounded-md
                        hover:text-gray-900 hover:bg-gray-50
                      "
                    >
                      <span
                        :class="[
                          team.bgColorClass,
                          'w-2.5 h-2.5 mr-4 rounded-full',
                        ]"
                        aria-hidden="true"
                      />
                      <span class="truncate">
                        {{ team.name }}
                      </span>
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </TransitionChild>
        <div class="flex-shrink-0 w-14" aria-hidden="true">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Static sidebar for desktop -->
    <div class="hidden lg:flex lg:flex-shrink-0">
      <div
        class="
          flex flex-col
          w-64
          border-r border-gray-200
          pt-3
          pb-4
          bg-gray-100
        "
      >
        <div class="flex items-center flex-shrink-0 px-6 border-b pb-3">
          <img
            class="h-8 w-auto object-contain"
            src="/images/logo.png"
            alt="PRAXXYS"
          />
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
          <!-- User account dropdown -->
          <Menu as="div" class="px-3 mt-3 relative inline-block text-left">
            <div>
              <MenuButton
                class="
                  group
                  w-full
                  bg-gray-100
                  rounded-md
                  px-3.5
                  py-2
                  text-sm text-left
                  font-medium
                  text-gray-700
                  hover:bg-gray-200
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-offset-gray-100
                  focus:ring-yellow-300
                "
              >
                <span class="flex w-full justify-between items-center">
                  <span
                    class="flex min-w-0 items-center justify-between space-x-3"
                  >
                    <img
                      class="w-10 h-10 bg-gray-300 rounded-full object-cover"
                      :src="$page.props.user.profile_photo_url"
                      :alt="$page.props.user.name"
                    />
                    <span class="flex-1 flex flex-col min-w-0">
                      <span
                        class="text-gray-900 text-sm font-medium truncate"
                        >{{ $page.props.user.name }}</span
                      >
                      <span class="text-gray-500 text-sm truncate">{{
                        $page.props.user.email
                      }}</span>
                    </span>
                  </span>
                  <SelectorIcon
                    class="
                      flex-shrink-0
                      h-5
                      w-5
                      text-gray-400
                      group-hover:text-gray-500
                    "
                    aria-hidden="true"
                  />
                </span>
              </MenuButton>
            </div>
            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="
                  z-10
                  mx-3
                  origin-top
                  absolute
                  right-0
                  left-0
                  mt-1
                  rounded-md
                  shadow-lg
                  bg-white
                  ring-1 ring-black ring-opacity-5
                  divide-y divide-gray-200
                  focus:outline-none
                "
              >
                <div class="py-1">
                  <MenuItem v-slot="{ active }">
                    <Link
                      :href="route('admin.profile.show')"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                    >
                      View Profile
                    </Link>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Settings</a
                    >
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Notifications</a
                    >
                  </MenuItem>
                </div>
                <div class="py-1">
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Get desktop app</a
                    >
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Support</a
                    >
                  </MenuItem>
                </div>
                <div class="py-1">
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      @click="logout"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Logout</a
                    >
                  </MenuItem>
                </div>
              </MenuItems>
            </transition>
          </Menu>
          <div class="w-full border-t mt-3 border-gray-200 shadow-sm"></div>
          <!-- Navigation -->
          <nav class="px-3 mt-3">
            <div class="space-y-1">
              <Link
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                :class="[
                  isCurrentUrl(item.href)
                    ? 'bg-gray-200 text-gray-900'
                    : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50',
                  'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                ]"
                :aria-current="item.current ? 'page' : undefined"
              >
                <component
                  :is="item.icon"
                  :class="[
                    isCurrentUrl(item.href)
                      ? 'text-gray-500'
                      : 'text-gray-400 group-hover:text-gray-500',
                    'mr-3 flex-shrink-0 h-6 w-6',
                  ]"
                  aria-hidden="true"
                />
                {{ item.name }}
              </Link>
            </div>
            <div class="mt-8">
              <!-- Secondary navigation -->
              <h3
                class="
                  px-3
                  text-xs
                  font-semibold
                  text-gray-500
                  uppercase
                  tracking-wider
                "
                id="desktop-teams-headline"
              >
                Teams
              </h3>
              <div
                class="mt-1 space-y-1"
                role="group"
                aria-labelledby="desktop-teams-headline"
              >
                <a
                  v-for="team in teams"
                  :key="team.name"
                  :href="team.href"
                  class="
                    group
                    flex
                    items-center
                    px-3
                    py-2
                    text-sm
                    font-medium
                    text-gray-700
                    rounded-md
                    hover:text-gray-900 hover:bg-gray-50
                  "
                >
                  <span
                    :class="[
                      team.bgColorClass,
                      'w-2.5 h-2.5 mr-4 rounded-full',
                    ]"
                    aria-hidden="true"
                  />
                  <span class="truncate">
                    {{ team.name }}
                  </span>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <!-- Main column -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <!-- Search header -->
      <div
        class="
          relative
          z-10
          flex-shrink-0 flex
          h-16
          bg-white
          border-b border-gray-200
          lg:hidden
        "
      >
        <button
          class="
            px-4
            border-r border-gray-200
            text-gray-500
            focus:outline-none
            focus:ring-2
            focus:ring-inset
            focus:ring-yellow-300
            lg:hidden
          "
          @click="sidebarOpen = true"
        >
          <span class="sr-only">Open sidebar</span>
          <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />
        </button>
        <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
          <div class="flex-1 flex">
            <form class="w-full flex md:ml-0" action="#" method="GET">
              <label for="search-field" class="sr-only">Search</label>
              <div
                class="relative w-full text-gray-400 focus-within:text-gray-600"
              >
                <div
                  class="
                    absolute
                    inset-y-0
                    left-0
                    flex
                    items-center
                    pointer-events-none
                  "
                >
                  <SearchIcon class="h-5 w-5" aria-hidden="true" />
                </div>
                <input
                  id="search-field"
                  name="search-field"
                  class="
                    block
                    w-full
                    h-full
                    pl-8
                    pr-3
                    py-2
                    border-transparent
                    text-gray-900
                    placeholder-gray-500
                    focus:outline-none
                    focus:ring-0
                    focus:border-transparent
                    focus:placeholder-gray-400
                    sm:text-sm
                  "
                  placeholder="Search"
                  type="search"
                />
              </div>
            </form>
          </div>
          <div class="flex items-center">
            <!-- Profile dropdown -->
            <Menu as="div" class="ml-3 relative">
              <div>
                <MenuButton
                  class="
                    max-w-xs
                    bg-white
                    flex
                    items-center
                    text-sm
                    rounded-full
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-yellow-300
                  "
                >
                  <span class="sr-only">Open user menu</span>
                  <img
                    class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt=""
                  />
                </MenuButton>
              </div>
              <transition
                enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
              >
                <MenuItems
                  class="
                    origin-top-right
                    absolute
                    right-0
                    mt-2
                    w-48
                    rounded-md
                    shadow-lg
                    bg-white
                    ring-1 ring-black ring-opacity-5
                    divide-y divide-gray-200
                    focus:outline-none
                  "
                >
                  <div class="py-1">
                    <MenuItem v-slot="{ active }">
                      <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="item.href"
                        :class="[
                          isCurrentUrl(item.href)
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                      >
                        View Profile
                      </Link>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                      <a
                        href="#"
                        :class="[
                          active
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                        >Settings</a
                      >
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                      <a
                        href="#"
                        :class="[
                          active
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                        >Notifications</a
                      >
                    </MenuItem>
                  </div>
                  <div class="py-1">
                    <MenuItem v-slot="{ active }">
                      <a
                        href="#"
                        :class="[
                          active
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                        >Get desktop app</a
                      >
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                      <a
                        href="#"
                        :class="[
                          active
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                        >Support</a
                      >
                    </MenuItem>
                  </div>
                  <div class="py-1">
                    <MenuItem v-slot="{ active }">
                      <a
                        @click="logout"
                        href="#"
                        :class="[
                          active
                            ? 'bg-gray-100 text-gray-900'
                            : 'text-gray-700',
                          'block px-4 py-2 text-sm',
                        ]"
                        >Logout</a
                      >
                    </MenuItem>
                  </div>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>
      <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
        <!-- Page title & actions -->
        <div
          class="
            border-b border-gray-200
            px-4
            py-4
            sm:flex sm:items-center sm:justify-between sm:px-6
            lg:px-8
          "
        >
          <div class="flex min-w-0">
            <button
              v-if="canBack"
              @click="goBack"
              class="
                border border-transparent
                text-xs
                font-medium
                text-gray-600
                hover:text-gray-300
                focus:outline-none
                mr-1
              "
            >
              <ChevronLeftIcon class="h-5 w-5" />
            </button>
            <h1
              class="
                text-lg
                font-medium
                leading-6
                text-gray-900
                sm:truncate
                dark:text-white
              "
            >
              {{ title }}
            </h1>
          </div>
          <div class="mt-4 flex sm:mt-0 sm:ml-4">
            <breadcrumbs :pages="breadcrumbPages" />
          </div>
        </div>

        <!-- Flash Messages -->
        <flash-messages />

        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { ref, computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import FlashMessages from "@/Components/FlashMessages.vue";
import {
  Dialog,
  DialogOverlay,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import {
  HomeIcon,
  MenuAlt1Icon,
  ChevronLeftIcon,
  XIcon,
} from "@heroicons/vue/outline";
import {
  SearchIcon,
  SelectorIcon,
  LibraryIcon,
  UserGroupIcon,
} from "@heroicons/vue/solid";

const navigation = [
  { name: "Dashboard", href: route("admin.dashboard"), icon: HomeIcon },
  {
    name: "Admin Management",
    href: route("admin.admin-management.index"),
    icon: LibraryIcon,
  },
  { name: "User Management", href: "#", icon: UserGroupIcon },
];
const teams = [
  { name: "Engineering", href: "#", bgColorClass: "bg-indigo-500" },
  { name: "Human Resources", href: "#", bgColorClass: "bg-green-500" },
  { name: "Customer Success", href: "#", bgColorClass: "bg-yellow-500" },
];

export default {
  components: {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    MenuAlt1Icon,
    SearchIcon,
    SelectorIcon,
    LibraryIcon,
    XIcon,
    ChevronLeftIcon,
    Link,
    Breadcrumbs,
    FlashMessages,
  },
  props: {
    title: String,
    breadcrumbPages: {
      type: Array,
      default: [],
    },
    backUrl: {
      type: String,
      default: null,
    },
    showBack: {
      type: Boolean,
      default: false,
    },
  },
  setup(props) {
    const sidebarOpen = ref(false);

    const canBack = computed(() => props.showBack);

    function goBack() {
      const url =
        props.backUrl === null
          ? props.breadcrumbPages[props.breadcrumbPages.length - 2].href
          : props.backUrl;
      Inertia.visit(url);
    }

    return {
      navigation,
      teams,
      sidebarOpen,
      goBack,
      canBack,
    };
  },
  methods: {
    logout() {
      this.$inertia.post(route("admin.logout"));
    },
    isCurrentUrl(href) {
      const currentUrl = this.$page.url.substr(1);
      return href.endsWith(currentUrl);
    },
  },
};
</script>
