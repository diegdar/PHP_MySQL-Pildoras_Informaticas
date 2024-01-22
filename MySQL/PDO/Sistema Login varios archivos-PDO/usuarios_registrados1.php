<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
th, td {
    border: 2px solid black;
    padding: 5px;
    text-align: center;
    vertical-align: middle;
}

table {
    margin: auto;
    width: 400px;
    height: 200px;
}
    </style>

</head>
<body>

<?php

    // Creacion/Reanudacion de la sesion del usuario validado
    session_start();

    // !isset comprueba si NO se almaceno algo en la variable superglobal "user", si se cumple esta condición es porque no se valido el usuario por lo que sera redirigido al formulario de login
    if(!isset($_SESSION["user"])){

        header("location:login.html");

    }

?>
<h1>Bienvenidos Usuarios.</h1>
<h2>Zona usuario registrados!</h2>

<?php
    echo "<h1>Hola " . $_SESSION["user"] . "!</h1>";
?>
<a href="cierre_sesion.php">Cerrar sesion</a>
<br><br>
    <p>Esto es información solo para usuarios registrados:</p>
    <table>
        <tr>
            <th colspan="3">Zona usuarios registrados</th>
        </tr>
        <tr>
            <td><a href="usuarios_registrados2.php">Página 1</a></td>
            <td><a href="usuarios_registrados3.php">Página 2</a></td>
            <td><a href="usuarios_registrados4.php">Página 3</a></td>
        </tr>
    </table>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta non facere numquam, obcaecati corporis eaque reiciendis quidem rem at sed officiis placeat nam voluptates? Nisi modi possimus reiciendis voluptatem dicta?
    Excepturi libero provident esse nihil consequuntur eveniet neque a laborum iste dicta quisquam quis beatae accusantium quasi ducimus, natus, voluptatum rem. Molestias nemo magnam illum, quaerat unde vero officia natus?
    Temporibus incidunt itaque pariatur nobis ad rerum alias aliquid? Culpa, commodi blanditiis molestias nisi magnam rerum pariatur placeat nostrum suscipit dolorem, explicabo repudiandae expedita earum enim fugiat vel, illum similique.
    Eos mollitia minima beatae, aperiam atque debitis doloribus velit perspiciatis suscipit praesentium neque ipsa, nisi in totam modi sequi quod consequatur vero vel eaque doloremque possimus ea deserunt? Accusantium, nemo.
    Dolore omnis vitae deserunt quos reiciendis non in, ut iusto architecto, laborum neque. Cumque omnis cum explicabo minima ducimus labore rem consequatur velit reprehenderit facilis, voluptas, maiores odio fugiat sapiente?
    Numquam repellendus temporibus, porro ab delectus quis sapiente ex voluptatum explicabo placeat voluptas eveniet in. Laboriosam veritatis est quae odit nemo nihil facere neque modi, officiis reiciendis magni aspernatur accusantium!
    Voluptatem provident unde eius perspiciatis odit in laudantium numquam reiciendis? Eos quidem quod nihil, odit alias facilis dolorum voluptate eum provident. Nemo rerum unde eius nostrum minus quas facere. Doloremque.
    Commodi distinctio saepe, hic quo neque sint aliquid quidem molestiae molestias ipsa error autem nemo facilis dolores adipisci exercitationem nesciunt earum perspiciatis nisi praesentium! Quasi vitae id amet perspiciatis cum.
    Excepturi quas consequatur quisquam id consectetur voluptates voluptate assumenda explicabo atque doloribus, placeat nemo. Aliquam dolorum corrupti doloribus vero vitae? Mollitia rerum sit aspernatur doloremque quae architecto earum deserunt totam?
    Aut officiis saepe sunt ab? At nam quia consequuntur. Fuga, amet. Quam inventore ad doloremque officia ea. Molestias, earum eius placeat vel architecto quisquam quo ullam. Optio aliquid doloremque aliquam?
    Ad, quas? Ad, debitis! At quia cupiditate dolorem, et modi dolorum repellat harum nemo tempora quod laborum praesentium. Deserunt exercitationem nemo sed dolor amet consequatur facere rem nisi ab ratione!
    Animi nemo quisquam harum magnam obcaecati tempore consectetur soluta iure molestiae, inventore eaque ipsa eius a maiores! Architecto accusamus, quod voluptate officia blanditiis itaque quis accusantium pariatur qui quaerat dolores!
    Consequatur ducimus similique aperiam sunt reprehenderit itaque voluptatum in magnam quam tempore, suscipit, nesciunt placeat, ab non labore neque soluta quos delectus magni veritatis repellendus maxime dicta quasi fugit. Accusantium.
    Maiores, rerum. Quibusdam dolor sint porro iste enim ipsa molestias, laborum perspiciatis soluta officiis iure delectus nam eligendi, doloribus possimus! Est esse id illum temporibus consequuntur minus sit tempora quia!
    Quidem expedita sapiente nemo! Ex autem facilis natus voluptatem doloribus magni reiciendis distinctio, odit ut! Rem reiciendis commodi reprehenderit aut, ullam tempora eveniet at vel cum, fuga ut, optio atque!
    Tenetur maiores quidem alias totam labore, ducimus voluptatibus exercitationem iure esse minima repellat, eum, quia nobis accusantium porro illo dignissimos. Quam quia enim corrupti, corporis et repellat quasi iste ducimus?
    Modi quae itaque quaerat tempore repellendus iste pariatur veritatis ex error placeat reiciendis magnam illum dicta voluptate quia blanditiis a est rerum quibusdam aperiam quod rem, ipsum eius. Harum, tempora.
    Incidunt, illo soluta. Optio doloribus error quae facilis expedita fugit deleniti ipsum placeat nostrum porro repellat veritatis laboriosam sunt iste molestias harum rerum, fuga velit officia explicabo! Laudantium, nobis architecto.
    Dolorum, et, culpa officiis exercitationem blanditiis adipisci cum eaque quis quibusdam recusandae vel? Eius eveniet quam quod corrupti velit a, tenetur expedita possimus suscipit neque autem, ullam, aliquid mollitia odit?
    Cupiditate ipsa mollitia blanditiis exercitationem deserunt optio maiores minima quia ad maxime aspernatur, explicabo non nisi repellat eaque alias error et porro? Necessitatibus quos, vitae aliquam harum alias amet aperiam?
    Tenetur corrupti doloribus reprehenderit aut dolor ipsa, molestias culpa id error laboriosam excepturi autem fuga aliquid reiciendis sit perferendis eum consectetur? Inventore consequatur saepe quod magni natus ratione animi sapiente!
    Porro tenetur, aut cupiditate vel, ducimus praesentium asperiores quaerat quisquam, nihil obcaecati rerum repudiandae odio. Aspernatur dolore beatae laboriosam, voluptates temporibus hic amet. Sint dignissimos non sit accusamus veniam facere!
    Sunt, consequuntur est! Expedita assumenda, tempore porro nostrum totam quibusdam id blanditiis ratione consequuntur debitis neque. Reiciendis repudiandae eligendi tenetur illo cum impedit non odit aliquid perferendis culpa? Molestiae, ut?
    Illo iusto officia architecto, tenetur esse harum debitis qui repudiandae assumenda corporis et praesentium sit! Adipisci quisquam laborum, illum consectetur, necessitatibus cupiditate facilis aspernatur vel accusantium ut excepturi eum debitis.
    Eveniet, sunt. Explicabo voluptatum corrupti et dicta blanditiis perferendis quisquam. Quam ab dignissimos, at unde doloribus ut libero deserunt reprehenderit molestias, aspernatur expedita eligendi animi amet nostrum ex esse earum.
    Sit cum, sapiente optio beatae voluptates ratione minima odit. Hic in odio earum ipsum quisquam debitis, dignissimos necessitatibus suscipit facere minus! Nisi quod adipisci cumque illo quos eligendi vero accusantium!
    Fuga sint, in cum temporibus ab facilis praesentium saepe impedit quos animi ullam aliquid dolorem dolorum delectus! Error dicta dolor qui illum, amet doloremque veniam tempore, aut minima voluptatum suscipit.
    Eligendi iure veritatis officia sapiente assumenda magnam impedit blanditiis autem voluptate omnis, est ea eum eius mollitia quia quis commodi atque, voluptatum ut provident voluptatem dignissimos itaque? Ducimus, beatae aliquid.
    Perspiciatis consequatur ea laudantium dicta, dignissimos vel nesciunt ex voluptate, quia, molestias dolore beatae blanditiis repudiandae ipsum quam molestiae odit. Eum ab molestiae tempora officia iure debitis consequatur placeat aut?
    Corporis, obcaecati adipisci. Soluta ab sint unde adipisci nam! Rerum reprehenderit saepe unde voluptas quam? Repellendus iure temporibus possimus earum sapiente, eligendi obcaecati quis vitae voluptatem unde quas quo totam.
    Quo possimus corporis provident, autem beatae aspernatur animi fugit esse sed facere quis ut molestiae, explicabo corrupti! Perspiciatis, nostrum? Molestiae aliquid fuga veritatis id modi saepe delectus quisquam adipisci. Rem.
    Voluptas magni ipsa ipsum quasi dolor commodi praesentium temporibus aspernatur libero. Dolores nostrum accusantium nisi, maiores dolorem blanditiis consequatur. A velit nesciunt ut voluptatum accusamus provident dolore amet ex placeat.
    Consequuntur veritatis nulla reiciendis? Ipsa neque, consectetur accusantium magnam, sunt consequuntur porro dignissimos sapiente tempora corrupti, molestias perferendis placeat vel delectus distinctio libero ex expedita doloribus natus a inventore laudantium!
    Reiciendis dignissimos repellat maiores ducimus, blanditiis vel minima! Quam, laudantium. Eveniet, maxime dolore voluptatum vitae doloremque molestiae veritatis accusantium libero, deserunt saepe quo consectetur, assumenda est cupiditate impedit voluptas corporis.
    Ratione dolores eligendi non temporibus quos autem corporis ipsam delectus. Veniam quisquam, commodi hic possimus iure consequatur quam libero tenetur? Fugiat voluptates, cum nisi nobis ipsam facilis quos iusto quae?
    Natus quisquam est commodi ullam quidem ipsum nisi dolorem voluptatibus aliquam? Velit inventore molestiae libero possimus eveniet! Ad possimus ex porro, laboriosam esse, doloremque officia sapiente enim quos illum id.
    Nam minus doloribus voluptatem veritatis, aliquam provident necessitatibus officia, ratione culpa et qui sit aliquid, delectus consequatur? Qui, et atque amet consectetur natus perspiciatis quam repellendus magni dignissimos quae sunt.
    Doloremque culpa laboriosam perspiciatis, similique labore perferendis ipsam? Labore pariatur, velit explicabo sunt facilis incidunt blanditiis fugiat cum dolor voluptas praesentium nihil, suscipit veniam ea dolorum qui repellendus reprehenderit nobis?
    Ratione culpa eligendi quaerat. Quo vel possimus, aperiam corporis assumenda aliquam tempora error quam nam! Esse ex inventore ut ratione, asperiores nam et consequatur ullam non, odio modi mollitia provident.
    Ut illo modi voluptatem. Possimus illum ducimus sapiente ratione quam, tenetur aliquam assumenda itaque aperiam explicabo, asperiores iusto id laborum hic culpa soluta nemo est harum ut dignissimos molestias. Temporibus.
    Harum soluta dolores nesciunt nulla, fugiat adipisci nisi quaerat praesentium cupiditate quia voluptate eius vero, eos aliquid molestias dicta omnis? Temporibus expedita consectetur delectus amet eligendi obcaecati, neque mollitia perspiciatis!
    Iusto veritatis, beatae voluptates modi cum ab inventore repellendus veniam et deleniti omnis explicabo harum ut incidunt repudiandae corrupti qui quo, sit quibusdam. Ad et doloribus saepe temporibus aliquid esse.
    Adipisci, temporibus nam illum qui vitae ab ea aut beatae rem veniam eveniet dolores consequuntur nobis corrupti aperiam assumenda modi quos mollitia amet nesciunt vel quisquam dicta facere error! Aspernatur!
    Commodi consequatur ratione nostrum quasi quis quidem doloremque reiciendis, necessitatibus nobis doloribus ducimus provident placeat sit quisquam suscipit maiores corporis, odio quibusdam ad nemo inventore modi. Perspiciatis fugit sed sint.
    Qui reprehenderit laboriosam a maiores ipsa eum vero, accusantium, rem harum eaque quos tempore, aperiam error sunt placeat ullam nisi earum sint tenetur. Culpa accusantium quis earum alias facilis vero!
    Voluptatum sit consequatur ad, quas distinctio placeat eligendi aspernatur molestias, itaque sunt, corporis doloribus voluptate fuga hic fugit quis architecto eius officia voluptatem. Odio vitae fugiat minus iusto magnam pariatur.
    Optio quia fugiat velit, laboriosam minus accusantium impedit. Quidem nam consectetur qui harum, labore beatae veritatis consequuntur maiores. Nisi pariatur maiores corporis amet blanditiis expedita accusantium obcaecati unde veritatis officiis!
    Numquam, voluptas placeat in cum maiores, harum vero voluptate nostrum voluptatibus consectetur reiciendis quae. Maiores deleniti sapiente quasi quaerat nobis, sit dolorum, nesciunt cumque ipsam pariatur culpa temporibus, laborum possimus.
    Voluptatibus mollitia error, incidunt corrupti illum vitae aliquam impedit, quisquam nemo voluptates cum nam sint dolorum deserunt modi facilis quam reprehenderit. Commodi repudiandae vitae, illo praesentium rerum minus. Recusandae, reiciendis.
    Eum non sed numquam error assumenda ea possimus nihil libero quia hic natus nostrum rerum ab perferendis autem unde, officiis amet fugiat voluptates illum eaque saepe. Corrupti placeat magnam ex.</p>
</body>
</html>