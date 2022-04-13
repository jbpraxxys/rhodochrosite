<template>
    
    <p class="text-green-900 mb-1 font--small">Solid Buttons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-primary">Primary Button</button>
        </div>
        <div>
            <button class="btn btn-secondary">Secondary Button</button>
        </div>
    </div>

    <p class="text-green-900 mb-1 font--small">Outline Buttons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-outline-primary">Outline Button</button>
        </div>
        <div>
            <button class="btn btn-outline-secondary">Outline Button</button>
        </div>
    </div>

    <p class="text-green-900 mb-1 font--small">Outline Fill Buttons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-outline-primary-fill">Outline Fill Button</button>
        </div>
        <div>
            <button class="btn btn-outline-secondary-fill">Outline Fill Button</button>
        </div>
    </div>

    <p class="text-green-900 mb-1 font--small">Small Buttons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-primary btn-small">Outline Button</button>
        </div>
        <div>
            <button class="btn btn-outline-secondary btn-small">Outline Button</button>
        </div>
    </div>

    <p class="text-green-900 mb-1 font--small">Buttons With Icons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-primary btn-icon">
                <img src="images/icons/ic-search.svg" width="24">
                <span class="ml-1">
                    Button with Icon
                </span>
            </button>
        </div>
        <div>
            <button class="btn btn-primary btn-icon">
                <span class="mr-1">
                    Button with Icon
                </span>
                <img src="images/icons/ic-search.svg" width="24">
            </button>
        </div>
    </div>

    <p class="text-green-900 mb-1 font--small">Buttons With Add Ons</p>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-primary btn-small">
                Small Button
            </button>
        </div>
        <div>
            <button class="btn btn-primary min">
                <span class="mr-1">
                    Min Width
                </span>
            </button>
        </div>
    </div>
    <div class="flex flex-row gap-6 mb-6">
        <div>
            <button class="btn btn-primary curve-corners">
                Button Curve Corners
            </button>
        </div>
        <div>
            <button class="btn btn-primary btn-small curve-corners">
                <img src="images/icons/ic-search.svg" width="16">
            </button>
        </div>
    </div>

</template>
<script>
export default {
    
}
</script>