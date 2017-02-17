function fightCalc(weapon_strength, caracter_strength, skill, knowledge, stamina, luck, caracter_level,enemy_lvl) {
	var damage = weapon_strength*(1+(caracter_strength/10));
	var dodge = skill/2;
	var resistance = knowledge/2;
	var hp = stamina*5*(caracter_level+1);
	var critical = luck*5/(enemy_lvl*2);
	return [damage,dodge,resistance,hp];
}

console.log(fightCalc(4,20,18,14,18,13,2,0));