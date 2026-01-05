import axiso from'axiso';

interface UserData{
    [key:string]:any;
}
interface ListItem{
    id:number;
    name:string;
    uname:string;
    file:string;
}
export default async function SSRpage(){
    let data:ListItem[]=[];
    
return(
    <div>
        <h1>SSR Page</h1>
    </div>
    {data.length>0 =>(
        <ul>
            {data.map((item)=>(
                <li key={item.id}>
                    <h2>{item.name}({item.uname})</h2>
                    <img src={item.file} alt={item.name} width={100} height={100}/>
                </li>
            ))}
        </ul>   

    )}
    async function fetchData():Promise<ListItem[]>{
        try{
            const response=await axiso.get<UserData[]>('https://jsonplaceholder.typicode.com/users');
            return response.data.map((user)=>({ 
                id:user.id,
                name:user.name,
                uname:user.username,
                file:`https://robohash.org/${user.username}?size=100x100`
            }));
        }

)   
}