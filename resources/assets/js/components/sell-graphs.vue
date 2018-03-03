<template>
    <vtable
        :columns="cols"
        :data="names"
    ></vtable> 
</template>

<script>
export default {
    created()
    {
        axios
            .post(`${AppRootPath}/graph/sells/profits`)
            .then( res => {
                console.log(res.data.map( el => { 
                    return {
                        name: el.product_id
                    }
                } ));
            } )

            
    },
    mounted()
    {
        
    },
    data()
    {
        return {
            cols: [ 'Name' , 'ID' ],
            names: [
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642'],
                ['Rayhan' , '1520527642']
            ]
        }
    }
}
</script>
