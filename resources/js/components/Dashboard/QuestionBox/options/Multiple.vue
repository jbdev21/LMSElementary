<template>
    <div>
        <small><i>Put you options and correct answers below.</i></small>
        <Item v-for="option in options" 
            :key="option" 
            :option="option" 
            :ischecked="options[0] == option" 
            :isdisabled="options.length < 2" 
            @remove="remove" 
            />
        <!-- <div class="input-group mb-2" v-for="option in options" :key="option">
            <span class="input-group-text">
                <input type="radio" :value="option" name="answer" :checked="options[0] == option" aria-label="Radio button for following text input">
            </span>
            <input type="hidden" class="form-control" :name="`options[${option}]`" :value="option" aria-label="Text input with radio button">
            <input type="text"  required :tabindex="option" class="form-control" :name="`options[${option}]`" aria-label="Text input with radio button">

            <div class="input-group-prepend" v-if="option > 4">
            </div>
            <button class="btn btn-light text-danger" @click="remove(option)" :disabled="options.length < 2"  type="button">
                <i class="fa fa-remove"></i></button>
        </div> -->
        <a href="#" @click.prevent="add()"><small>+ Add Field</small></a>
    </div>
</template>

<script>
import Item from "./Item.vue"
export default {
    components: {
        Item
    },
   data()
    {
        return {
            options:[1, 2, 3, 4]
        }
    },
    methods:{
        add()
        {
            var lastitem = this.options.slice(-1)[0] + 1
            this.options.push(lastitem)
        },
        remove(option)
        {
            this.options.splice(this.options.indexOf(option), 1);
        },

    }
}
</script>

<style lang="scss" scoped>
    .form-control{
        border-radius: 0px !important;
    }
</style>