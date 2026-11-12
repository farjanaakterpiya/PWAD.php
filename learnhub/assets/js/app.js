/* LearnHub – shared script. Data is stored in this browser's localStorage (demo). */
const COURSES=[
{id:1,title:'Web Development Basics',cat:'Programming',level:'Beginner',price:1500,desc:'Build real web pages with HTML, CSS and JavaScript.',lessons:['How the web works','HTML structure','CSS layout','Responsive design','JavaScript basics','Build a project']},
{id:2,title:'Python for Beginners',cat:'Programming',level:'Beginner',price:1800,desc:'Learn programming from zero with Python.',lessons:['Install Python','Variables and types','Conditions and loops','Functions','Files and modules','Mini project']},
{id:3,title:'Graphic Design with Figma',cat:'Design',level:'Intermediate',price:0,desc:'Design interfaces, posters and social media posts.',lessons:['Figma tour','Layout and grids','Color and type','Components','Prototyping']},
{id:4,title:'Spoken English',cat:'Language',level:'All levels',price:1200,desc:'Speak clearly and confidently in daily situations.',lessons:['Greetings','Daily conversation','Pronunciation','Phone calls','Interview practice']},
{id:5,title:'Digital Marketing',cat:'Business',level:'Beginner',price:2000,desc:'Plan and run campaigns on Facebook and Google.',lessons:['Marketing basics','Facebook ads','Google search ads','Content planning','Reading reports']},
{id:6,title:'Freelancing Start',cat:'Business',level:'Beginner',price:900,desc:'Find clients, write proposals and get paid.',lessons:['Pick a service','Create a profile','Write proposals','Deliver work','Get paid']}];
const $=s=>document.querySelector(s);
const get=(k,d)=>{try{const v=JSON.parse(localStorage.getItem(k));return v==null?d:v}catch(e){return d}};
const set=(k,v)=>{try{localStorage.setItem(k,JSON.stringify(v))}catch(e){}};
const esc=s=>String(s).replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
const me=()=>get('lh_me',null);
const money=p=>p?'৳ '+p.toLocaleString():'Free';
const msg=(t,ok)=>{const m=$('#msg');if(m){m.className='msg '+(ok?'ok':'err');m.textContent=t;m.hidden=false}};
const mine=()=>{const u=me();return u?(get('lh_enr',{})[u.email]||{}):{}};
const saveMine=o=>{const a=get('lh_enr',{});a[me().email]=o;set('lh_enr',a)};
const pct=(c,done)=>Math.round((done||[]).length/c.lessons.length*100);
const card=c=>'<a class="card" href="course.html?id='+c.id+'"><div class="thumb"></div><div class="body"><span class="badge">'+esc(c.cat)+'</span><h3>'+esc(c.title)+'</h3><span class="meta">'+c.lessons.length+' lessons · '+esc(c.level)+'</span><span class="price">'+money(c.price)+'</span></div></a>';

const u=me();
$('#auth').innerHTML=u?'<a href="dashboard.html">My learning</a><a class="btn" href="#" id="out">Log out</a>':'<a href="login.html">Log in</a><a class="btn" href="register.html">Sign up</a>';
if($('#out'))$('#out').onclick=e=>{e.preventDefault();localStorage.removeItem('lh_me');location.href='index.html'};
const needLogin=()=>{if(!me()){location.href='login.html';return true}return false};
const page=document.body.dataset.page;

if(page==='home')$('#popular').innerHTML=COURSES.slice(0,4).map(card).join('');

if(page==='courses'){
  const cats=[...new Set(COURSES.map(c=>c.cat))];
  $('#cat').innerHTML='<option value="">All categories</option>'+cats.map(c=>'<option>'+c+'</option>').join('');
  const draw=()=>{const q=$('#q').value.toLowerCase(),k=$('#cat').value;
    const list=COURSES.filter(c=>(!k||c.cat===k)&&(c.title+c.desc).toLowerCase().includes(q));
    $('#grid').innerHTML=list.length?list.map(card).join(''):'<p class="meta">No course matches your search. Try another word.</p>'};
  $('#q').oninput=draw;$('#cat').onchange=draw;draw();
}

if(page==='course'){
  const id=+new URLSearchParams(location.search).get('id'),c=COURSES.find(x=>x.id===id);
  if(!c)$('#main').innerHTML='<p>Course not found. <a href="courses.html"><u>See all courses</u></a></p>';
  else{
    const draw=()=>{const enrolled=me()&&id in mine(),done=enrolled?mine()[id]:[],p=pct(c,done);
      $('#main').innerHTML='<div class="two-col"><div><div class="player">Video lesson player</div><h1>'+esc(c.title)+'</h1><p class="meta" style="margin:8px 0 20px">'+esc(c.desc)+'</p>'+
      '<div class="panel"><h3>Lessons</h3><ul class="lessons">'+c.lessons.map((l,i)=>'<li><span>'+(i+1)+'. '+esc(l)+'</span>'+
        (enrolled?(done.includes(i)?'<span class="ok">Done</span>':'<button class="btn ghost sm" data-i="'+i+'">Mark as done</button>'):'<span class="meta">Enroll to unlock</span>')+'</li>').join('')+'</ul></div></div>'+
      '<aside class="panel"><span class="badge">'+esc(c.cat)+'</span><p class="price" style="font-size:1.5rem;margin:10px 0">'+money(c.price)+'</p><p class="meta">'+c.lessons.length+' lessons · '+esc(c.level)+'</p>'+
      (enrolled?'<div class="track"><i style="width:'+p+'%"></i></div><p class="meta">'+p+'% complete</p>':'<button class="btn full" id="enroll" style="margin-top:14px">Enroll now</button>')+'</aside></div>'};
    draw();
    $('#main').onclick=e=>{
      if(e.target.id==='enroll'){if(needLogin())return;const m=mine();m[id]=[];saveMine(m);draw()}
      const b=e.target.closest('button[data-i]');if(b){const m=mine();m[id].push(+b.dataset.i);saveMine(m);draw()}};
  }
}

if(page==='register')$('#f').onsubmit=e=>{e.preventDefault();
  const n=$('#name').value.trim(),m=$('#email').value.trim().toLowerCase(),p=$('#password').value,users=get('lh_users',[]);
  if(!n||!/\S+@\S+\.\S+/.test(m)||p.length<6)return msg('Enter your name, a valid email and a password of at least 6 characters.');
  if(users.some(x=>x.email===m))return msg('This email is already registered. Log in instead.');
  users.push({name:n,email:m,password:p});set('lh_users',users);set('lh_me',{name:n,email:m});location.href='dashboard.html'};

if(page==='login')$('#f').onsubmit=e=>{e.preventDefault();
  const m=$('#email').value.trim().toLowerCase(),p=$('#password').value,x=get('lh_users',[]).find(x=>x.email===m&&x.password===p);
  if(!x)return msg('Email or password is incorrect.');
  set('lh_me',{name:x.name,email:x.email});location.href='dashboard.html'};

if(page==='dashboard'&&!needLogin()){
  $('#hello').textContent='Welcome, '+me().name;
  const m=mine(),ids=Object.keys(m);
  $('#list').innerHTML=ids.length?'<div class="grid">'+ids.map(id=>{const c=COURSES.find(x=>x.id==id),p=pct(c,m[id]);
    return '<div class="card"><div class="body"><h3>'+esc(c.title)+'</h3><span class="meta">'+m[id].length+' of '+c.lessons.length+' lessons done</span><div class="track"><i style="width:'+p+'%"></i></div><a class="btn ghost sm" href="course.html?id='+id+'" style="text-align:center">'+(p>=100?'Review':'Continue')+'</a></div></div>'}).join('')+'</div>'
    :'<p class="meta" style="margin-bottom:16px">You have not enrolled in any course yet.</p><a class="btn" href="courses.html">Find a course</a>';
}

if(page==='contact')$('#f').onsubmit=e=>{e.preventDefault();
  const all=get('lh_msgs',[]);all.push({name:$('#name').value,email:$('#email').value,text:$('#text').value,at:Date.now()});set('lh_msgs',all);
  $('#f').reset();msg('Message sent. We will reply within one working day.',true)};
