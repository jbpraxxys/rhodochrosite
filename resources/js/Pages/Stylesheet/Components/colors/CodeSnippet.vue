<template>

    <div class="sticky top-8 max-h-96 overflow-auto pl-10">
        <div class="mb-6">
            <h4 class="mb-4 font-semibold">Variables</h4>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Primary</p>
                <p class="text-gray-800">$color--primary: #F2BC57;</p>
                <p class="text-gray-800">$color--secondary: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Yellow</p>
                <p class="text-gray-800">$color--yellow--100: #FAE4BC;</p>
                <p class="text-gray-800">$color--yellow--500: #F2BC57;</p>
                <p class="text-gray-800">$color--yellow--600: #E8C87F;</p>
                <p class="text-gray-800">$color--yellow--700: #DDA339;</p>
                <p class="text-gray-800">$color--yellow--800: #DA9627;</p>
                <p class="text-gray-800">$color--yellow--900: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Green</p>
                <p class="text-gray-800">$color--green--50: #A0B1A5;</p>
                <p class="text-gray-800">$color--green--100: #4DE26F;</p>
                <p class="text-gray-800">$color--green--200: #28A745;</p>
                <p class="text-gray-800">$color--green--300: #135021;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Red Orange</p>
                <p class="text-gray-800">$color--redOrange--100: #FFBF7F;</p>
                <p class="text-gray-800">$color--redOrange--200: #FE7F00;</p>
                <p class="text-gray-800">$color--redOrange--300: #7F4000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Red</p>
                <p class="text-gray-800">$color--red--100: #FE8A65;</p>
                <p class="text-gray-800">$color--red--200: #C73101;</p>
                <p class="text-gray-800">$color--red--300: #641800;</p>
                <p class="text-gray-800">$color--red--400: #EB5757;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Blue</p>
                <p class="text-gray-800">$color--blue--50: #A0B1A5;</p>
                <p class="text-gray-800">$color--blue--200: #CADFFA;</p>
                <p class="text-gray-800">$color--blue--300: #2F80ED;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Others</p>
                <p class="text-gray-800">$color--skyBlue--50: #56CCF2;</p>
                <p class="text-gray-800">$color--orange--100: #F2994A;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Neutral Admin Merchant</p>
                <p class="text-gray-800">$color--white: #FFFFFF;</p>
                <p class="text-gray-800">$color--gray--50: #FAFAFA;</p>
                <p class="text-gray-800">$color--gray--100: #F5F5F5;</p>
                <p class="text-gray-800">$color--gray--200: #EEEEEE;</p>
                <p class="text-gray-800">$color--gray--300: #E0E0E0;</p>
                <p class="text-gray-800">$color--gray--400: #BDBDBD;</p>
                <p class="text-gray-800">$color--gray--500: #9E9E9E;</p>
                <p class="text-gray-800">$color--gray--600: #757575;</p>
                <p class="text-gray-800">$color--gray--700: #616161;</p>
                <p class="text-gray-800">$color--gray--800: #424242;</p>
                <p class="text-gray-800">$color--gray--900: #212121;</p>
                <p class="text-gray-800">$color--black: #000000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Neutral Design System</p>
                <p class="text-gray-800">$color--grayD--50: #F1F2f6;</p>
                <p class="text-gray-800">$color--grayD--100: #DFE4EA;</p>
                <p class="text-gray-800">$color--grayD--200: #C5CCD6;</p>
                <p class="text-gray-800">$color--grayD--300: #A1A9C2;</p>
                <p class="text-gray-800">$color--grayD--400: #737CA5;</p>
                <p class="text-gray-800">$color--grayD--500: #F4F8FC;</p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="mb-4 font-semibold">Text Color Classes</h4>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Primary</p>
                <p class="text-gray-800">.text--primary: #F2BC57;</p>
                <p class="text-gray-800">.text--secondary: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Yellow</p>
                <p class="text-gray-800">.text--yellow--100: #FAE4BC;</p>
                <p class="text-gray-800">.text--yellow--500: #F2BC57;</p>
                <p class="text-gray-800">.text--yellow--600: #E8C87F;</p>
                <p class="text-gray-800">.text--yellow--700: #DDA339;</p>
                <p class="text-gray-800">.text--yellow--800: #DA9627;</p>
                <p class="text-gray-800">.text--yellow--900: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Green</p>
                <p class="text-gray-800">.text--green--50: #A0B1A5;</p>
                <p class="text-gray-800">.text--green--100: #4DE26F;</p>
                <p class="text-gray-800">.text--green--200: #28A745;</p>
                <p class="text-gray-800">.text--green--300: #135021;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Red Orange</p>
                <p class="text-gray-800">.text--redOrange--100: #FFBF7F;</p>
                <p class="text-gray-800">.text--redOrange--200: #FE7F00;</p>
                <p class="text-gray-800">.text--redOrange--300: #7F4000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Red</p>
                <p class="text-gray-800">.text--red--100: #FE8A65;</p>
                <p class="text-gray-800">.text--red--200: #C73101;</p>
                <p class="text-gray-800">.text--red--300: #641800;</p>
                <p class="text-gray-800">.text--red--400: #EB5757;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Blue</p>
                <p class="text-gray-800">.text--blue--100: #A0B1A5;</p>
                <p class="text-gray-800">.text--blue--200: #CADFFA;</p>
                <p class="text-gray-800">.text--blue--300: #2F80ED;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Others</p>
                <p class="text-gray-800">.text--skyBlue--50: #56CCF2;</p>
                <p class="text-gray-800">.text--orange--100: #F2994A;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Neutral</p>
                <p class="text-gray-800">.text--white: #FFFFFF;</p>
                <p class="text-gray-800">.text--gray--50: #FAFAFA;</p>
                <p class="text-gray-800">.text--gray--100: #F5F5F5;</p>
                <p class="text-gray-800">.text--gray--200: #EEEEEE;</p>
                <p class="text-gray-800">.text--gray--300: #E0E0E0;</p>
                <p class="text-gray-800">.text--gray--400: #BDBDBD;</p>
                <p class="text-gray-800">.text--gray--500: #9E9E9E;</p>
                <p class="text-gray-800">.text--gray--600: #757575;</p>
                <p class="text-gray-800">.text--gray--700: #616161;</p>
                <p class="text-gray-800">.text--gray--800: #424242;</p>
                <p class="text-gray-800">.text--gray--900: #212121;</p>
                <p class="text-gray-800">.text--black: #000000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Text Color Neutral Design System</p>
                <p class="text-gray-800">.text--gray--50: #F1F2f6;</p>
                <p class="text-gray-800">.text--gray--100: #DFE4EA;</p>
                <p class="text-gray-800">.text--gray--200: #C5CCD6;</p>
                <p class="text-gray-800">.text--gray--300: #A1A9C2;</p>
                <p class="text-gray-800">.text--gray--400: #737CA5;</p>
                <p class="text-gray-800">.text--gray--500: #F4F8FC;</p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="mb-4 font-semibold">Background Color Classes</h4>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Primary</p>
                <p class="text-gray-800">.bg--primary: #F2BC57;</p>
                <p class="text-gray-800">.bg--secondary: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Yellow</p>
                <p class="text-gray-800">.bg--yellow--100: #FAE4BC;</p>
                <p class="text-gray-800">.bg--yellow--500: #F2BC57;</p>
                <p class="text-gray-800">.bg--yellow--600: #E8C87F;</p>
                <p class="text-gray-800">.bg--yellow--700: #DDA339;</p>
                <p class="text-gray-800">.bg--yellow--800: #DA9627;</p>
                <p class="text-gray-800">.bg--yellow--900: #D58824;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Green</p>
                <p class="text-gray-800">.bg--green--50: #A0B1A5;</p>
                <p class="text-gray-800">.bg--green--100: #4DE26F;</p>
                <p class="text-gray-800">.bg--green--200: #28A745;</p>
                <p class="text-gray-800">.bg--green--300: #135021;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Red Orange</p>
                <p class="text-gray-800">.bg--redOrange--100: #FFBF7F;</p>
                <p class="text-gray-800">.bg--redOrange--200: #FE7F00;</p>
                <p class="text-gray-800">.bg--redOrange--300: #7F4000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Red</p>
                <p class="text-gray-800">.bg--red--100: #FE8A65;</p>
                <p class="text-gray-800">.bg--red--200: #C73101;</p>
                <p class="text-gray-800">.bg--red--300: #641800;</p>
                <p class="text-gray-800">.bg--red--400: #EB5757;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Blue</p>
                <p class="text-gray-800">.bg--blue--100: #A0B1A5;</p>
                <p class="text-gray-800">.bg--blue--200: #CADFFA;</p>
                <p class="text-gray-800">.bg--blue--300: #2F80ED;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Others</p>
                <p class="text-gray-800">.bg--skyBlue--50: #56CCF2;</p>
                <p class="text-gray-800">.bg--orange--100: #F2994A;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Neutral</p>
                <p class="text-gray-800">.bg--white: #FFFFFF;</p>
                <p class="text-gray-800">.bg--gray--50: #FAFAFA;</p>
                <p class="text-gray-800">.bg--gray--100: #F5F5F5;</p>
                <p class="text-gray-800">.bg--gray--200: #EEEEEE;</p>
                <p class="text-gray-800">.bg--gray--300: #E0E0E0;</p>
                <p class="text-gray-800">.bg--gray--400: #BDBDBD;</p>
                <p class="text-gray-800">.bg--gray--500: #9E9E9E;</p>
                <p class="text-gray-800">.bg--gray--600: #757575;</p>
                <p class="text-gray-800">.bg--gray--700: #616161;</p>
                <p class="text-gray-800">.bg--gray--800: #424242;</p>
                <p class="text-gray-800">.bg--gray--900: #212121;</p>
                <p class="text-gray-800">.bg--black: #000000;</p>
            </div>
            <div class="block mb-4">
                <p class="text-green-900 mb-1 font--small"># Background Color Neutral</p>
                <p class="text-gray-800">.bg--gray--50: #F1F2f6;</p>
                <p class="text-gray-800">.bg--gray--100: #DFE4EA;</p>
                <p class="text-gray-800">.bg--gray--200: #C5CCD6;</p>
                <p class="text-gray-800">.bg--gray--300: #A1A9C2;</p>
                <p class="text-gray-800">.bg--gray--400: #737CA5;</p>
                <p class="text-gray-800">.bg--gray--500: #F4F8FC;</p>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    
}
</script>