// JavaScript Document
function lof(x)
{
	location.href=x
}

// 進階做法：將login.php及admin.php程式中login(table)函數存js.js中共用，以switch切換重新導向的網頁
// function login(table) {
//     $.get('./api/chk_ans.php',{ans:$("#ans").val()}, (chk) => {
//         // 實務上若驗證碼錯誤，會重新產生驗證碼，再要求重新輸入
//         if (parseInt(chk) == 0) {
//             alert("對不起，您輸入的驗證碼有誤，請您重新輸入")
//         } else {
//             // 若驗證碼正確，則檢查帳號與密碼是否正確
//             $.post('./api/chk_pw.php',{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
//                 if (parseInt(res)==0) {
//                     alert("帳號或密碼錯誤，請重新輸入")
//                 } else {
// 					switch (table) {
// 						case 's4_mem':					
// 							// 若帳號密碼正確，就回到首頁
// 							location.href='index.php'
// 						break;
// 						case 's4_admin':
// 							// 若帳號密碼正確，就回到後台管理頁面
// 							location.href='back.php?do=admin'
// 						break;
// 					}
//                 }
//             })
//         }
//     })
// }