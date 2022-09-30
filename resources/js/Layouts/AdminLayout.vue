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
            class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white"
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
                  class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                  @click="sidebarOpen = false"
                >
                  <span class="sr-only">Close sidebar</span>
                  <XCircleIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <div class="flex-shrink-0 flex items-center px-4">
              <img class="h-8 w-auto" src="/images/logo.png" alt="PRAXXYS" />
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
              <nav class="px-2">
                <div class="space-y-4">
                  <Link
                    :key="item.name"
                    :href="item.href"
                    :class="[
                      isCurrentUrl(item.parentUrl)
                        ? 'bg-gray-100 text-black'
                        : 'text-gray-600 hover:text-black',
                      'group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                    v-if="item.allowed"
                  >
                    <img
                      :src="item.icon"
                      :class="[
                        isCurrentUrl(item.parentUrl)
                          ? 'text-gray-500'
                          : 'text-gray-400 group-hover:text-gray-500',
                        'mr-4 flex-shrink-0 h-5 w-5',
                      ]"
                    />
                    {{ item.name }}
                  </Link>
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
        class="flex flex-col w-64 border-r border-gray-200 pt-3 pb-4 bg-white"
      >
        <div class="flex items-center flex-shrink-0 p-6 py-8">
          <img
            class="h-8 w-auto object-contain"
            src="/images/logo.png"
            alt="PRAXXYS"
          />
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
          <!-- User account dropdown -->
          <!-- <Menu as="div" class="px-3 mt-3 relative inline-block text-left">
            <div>
              <MenuButton
                class="
                  group
                  w-full
                  rounded-md
                  px-3.5
                  py-2
                  text-sm text-left
                  font-medium
                  text-gray-600
                  hover:bg-gray-100
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-offset-gray-100
                  focus:ring-primary-300
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
                  <ArrowsUpDownIcon
                    class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
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
                class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
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
                      :href="route('admin.notification.index')"
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
          <div class="w-full mt-3 shadow-sm"></div> -->
          <!-- Navigation -->
          <nav class="mt-3">
            <div
              class="space-y-4"
              role="group"
              aria-labelledby="desktop-main-headline"
            >
              <template v-for="item in navigation" :key="item.name">
                <div v-if="!item.children">
                  <Link
                    :href="item.href"
                    :class="[
                      isCurrentUrl(item.parentUrl)
                        ? 'text-black pl-0'
                        : 'text-gray-600 hover:text-black pl-8',
                      'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                    v-if="item.allowed"
                  >
                    <span
                      class="
                        bg-black
                        w-1.5
                        inline-block
                        h-5
                        mr-6
                        rounded-tr rounded-br
                      "
                      v-if="isCurrentUrl(item.parentUrl)"
                    />
                    <img
                      :src="
                        isCurrentUrl(item.parentUrl)
                          ? item.activeIcon
                          : item.icon
                      "
                      :class="[
                        isCurrentUrl(item.parentUrl)
                          ? 'text-gray-500'
                          : 'text-gray-400 group-hover:text-gray-500',
                        'mr-5 flex-shrink-0 h-5 w-5',
                      ]"
                    />
                    {{ item.name }}
                  </Link>
                </div>
                <Disclosure
                  as="div"
                  v-else-if="
                    item.children &&
                    item.children.filter((e) => e.allowed).length > 0
                  "
                  class="space-y-4"
                  v-slot="{ open }"
                  :defaultOpen="true"
                >
                  <DisclosureButton
                    :class="[
                      isCurrentUrl(item.parentUrl)
                        ? 'text-black pl-0'
                        : 'text-gray-600 hover:text-black pl-8',
                      'group w-full flex items-center pr-1 py-2 text-left text-sm font-medium focus:outline-none focus:ring-2 focus:ring-gray-300',
                    ]"
                  >
                    <span
                      class="
                        bg-black
                        w-1.5
                        inline-block
                        h-5
                        mr-7
                        rounded-tr rounded-br
                      "
                      v-if="isCurrentUrl(item.parentUrl)"
                    />
                    <img
                      :src="
                        isCurrentUrl(item.parentUrl)
                          ? item.activeIcon
                          : item.icon
                      "
                      :class="[
                        isCurrentUrl(item.parentUrl) ? '-ml-0.5' : 'ml-0',
                      ]"
                      class="
                        mr-5
                        flex-shrink-0
                        h-5
                        w-5
                        text-gray-500
                        group-hover:text-gray-500
                      "
                    />
                    <span class="flex-1 text-sm">
                      {{ item.name }}
                    </span>
                  </DisclosureButton>
                  <DisclosurePanel class="space-y-4">
                    <template
                      v-for="subItem in item.children"
                      :key="subItem.name"
                    >
                      <Link
                        :href="subItem.href"
                        :class="[
                          isCurrentUrl(subItem.parentUrl)
                            ? 'text-black pl-0'
                            : 'text-gray-600 hover:text-black pl-9',
                          'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                        ]"
                        :aria-current="subItem.current ? 'page' : undefined"
                        v-if="subItem.allowed"
                      >
                        <span
                          class="
                            bg-black
                            w-1.5
                            inline-block
                            h-5
                            mr-8
                            rounded-tr rounded-br
                          "
                          v-if="isCurrentUrl(subItem.parentUrl)"
                        />
                        <img
                          :src="
                            isCurrentUrl(subItem.parentUrl)
                              ? subItem.activeIcon
                              : subItem.icon
                          "
                          :class="[
                            isCurrentUrl(subItem.parentUrl)
                              ? '-ml-0.5'
                              : 'ml-0',
                            'mr-6 flex-shrink-0 h-3 w-3',
                          ]"
                        />
                        {{ subItem.name }}
                      </Link>
                    </template>
                  </DisclosurePanel>
                </Disclosure>
              </template>
            </div>
          </nav>
          
        </div>
      </div>
    </div>
    <!-- Main column -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <!-- Search header -->
      <div
        class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden"
      >
        <button
          class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-yellow-300 lg:hidden"
          @click="sidebarOpen = true"
        >
          <span class="sr-only">Open sidebar</span>
          <Bars3CenterLeftIcon class="h-6 w-6" aria-hidden="true" />
        </button>
        <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
          <div class="flex-1 flex">
            <form class="w-full flex md:ml-0" action="#" method="GET">
              <label for="search-field" class="sr-only">Search</label>
              <div
                class="relative w-full text-gray-400 focus-within:text-gray-600"
              >
                <div
                  class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                >
                  <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
                </div>
                <input
                  id="search-field"
                  name="search-field"
                  class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm"
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
                  class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300"
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
                  class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
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
                        :href="route('admin.notification.index')"
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
          class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
        >
          <div class="flex min-w-0">
            <button
              v-if="canBack"
              @click="goBack"
              class="border border-transparent text-xs font-medium text-gray-600 hover:text-gray-300 focus:outline-none mr-1"
            >
              <ChevronLeftIcon class="h-5 w-5" />
            </button>
            <h1
              class="text-lg font-medium leading-6 text-gray-900 sm:truncate dark:text-white"
            >
              {{ title }}
            </h1>
          </div>
          <div class="mt-4 flex sm:mt-0 sm:ml-4">
            <breadcrumbs :pages="breadcrumbPages" @logout="logout"/>
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
import { usePage } from "@inertiajs/inertia-vue3";
import Accordion from "@/Components/Accordion.vue";
import {
  Dialog,
  DialogOverlay,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
} from "@headlessui/vue";
import {
  HomeIcon,
  Bars3CenterLeftIcon,
  ChevronLeftIcon,
  XCircleIcon,
  ClipboardDocumentListIcon,
} from "@heroicons/vue/24/outline";
import {
  MagnifyingGlassIcon,
  ArrowsUpDownIcon,
  BuildingLibraryIcon,
  UserGroupIcon,
} from "@heroicons/vue/24/solid";

export default {
  components: {
    Accordion,
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    Bars3CenterLeftIcon,
    MagnifyingGlassIcon,
    ArrowsUpDownIcon,
    BuildingLibraryIcon,
    XCircleIcon,
    ChevronLeftIcon,
    Link,
    Breadcrumbs,
    FlashMessages,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
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
    const navigation = [
      {
        name: "Dashboard",
        href: "#",
        parentUrl: [
          "admin.dashboard*",
        ],
        icon: "/icons/nav/ic-nav-dashboard.svg",
        activeIcon: "/icons/nav/ic-nav-dashboard-active.svg",
        children: [
          {
            name: "Overview",
            href: route("admin.dashboard.index"),
            parentUrl: "admin.dashboard*",
            icon: "/icons/nav/ic-nav-bullet.svg",
            activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
            allowed: true
          },
        ],
      },
      {
        name: "Contents",
        href: "#",
        parentUrl: ["admin.cms*"],
        icon: "/icons/nav/ic-nav-contents.svg",
        activeIcon: "/icons/nav/ic-nav-contents-active.svg",
        children: [
          {
            name: "Pages",
            href: route("admin.cms.index"),
            parentUrl: "admin.cms*",
            icon: "/icons/nav/ic-nav-bullet.svg",
            activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
            allowed: true
          },
        ],
      },
      {
        name: "Accounts",
        href: "#",
        parentUrl: [
          "admin.admin-management*",
          "admin.role-permission-management*",
        ],
        icon: "/icons/nav/ic-nav-accounts.svg",
        activeIcon: "/icons/nav/ic-nav-accounts-active.svg",
        children: [
          {
            name: "Admins",
            href: route("admin.admin-management.index"),
            parentUrl: "admin.admin-management*",
            icon: "/icons/nav/ic-nav-bullet.svg",
            activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
            allowed: true
          },
          {
            name: "Roles",
            href: route("admin.role-permission-management.index"),
            parentUrl: "admin.role-permission-management*",
            icon: "/icons/nav/ic-nav-bullet.svg",
            activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
            allowed: true
          },
        ],
      },
      {
        name: "Reports",
        href: route("admin.reports-management.index"),
        parentUrl: "admin.reports-management*",
        icon: "/icons/nav/ic-nav-reports.svg",
        activeIcon: "/icons/nav/ic-nav-reports-active.svg",
        allowed: true
      },
      {
        name: "Settings",
        href: route("admin.settings-management.index"),
        parentUrl: "admin.settings-management*",
        icon: "/icons/nav/ic-nav-settings.svg",
        activeIcon: "/icons/nav/ic-nav-settings-active.svg",
        allowed: true
      },
      {
        name: "Activity Logs",
        href: route("admin.activity-logs.index"),
        parentUrl: "admin.activity-logs*",
        icon: "/icons/nav/ic-nav-activity-logs.svg",
        activeIcon: "/icons/nav/ic-nav-activity-logs-active.svg",
        allowed: true
      },
    ];
    // const navigation = [
    //   {
    //     name: "Dashboard",
    //     href: route("admin.dashboard"),
    //     icon: HomeIcon,
    //     allowed: true,
    //   },
    //   {
    //     name: "Admin Management",
    //     href: route("admin.admin-management.index"),
    //     icon: LibraryIcon,
    //     allowed: true,
    //   },
    //   { name: "CMS", href: route("admin.cms.index"), icon: DocumentTextIcon },
    //   {
    //     name: "Roles & Permissions",
    //     href: route("admin.role-permission-management.index"),
    //     icon: UserGroupIcon,
    //     allowed: true,
    //   },
    //   {
    //     name: "Activity Logs",
    //     href: route("admin.activity-logs.index"),
    //     icon: ClipboardListIcon,
    //     allowed: usePage().props.value.session_permissions.includes(
    //       "manage-activity-logs"
    //     ),
    //   },
    // ];

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
      sidebarOpen,
      goBack,
      canBack,
    };
  },
  methods: {
    logout() {
      this.$inertia.post(route("admin.logout"));
    },
    isCurrentUrl(url) {
      if (Array.isArray(url)) {
        let value = false;

        url.forEach((href, index) => {
          if (route().current(href)) {
            value = true;
          }
        });

        return value;
      } else {
        return route().current(url);
      }

      // const currentUrl = this.$page.url.substr(1);
      // return href.endsWith(currentUrl);
    },
  },
};
</script>
