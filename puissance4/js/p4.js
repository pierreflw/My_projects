class Puissance4 {
    constructor() {
        this.ROWS = prompt("Combien de lignes voulez-vous ?","6");
        this.COLS = prompt("Combien de colonnes voulez-vous" , "7");
        this.joueur = 'rouge';
        this.div = $('#puissance4');
        this.GameOver = false;
        this.actionJoueur = function () {
        };
        this.affichGrille();
        this.ecoute();

    }

    affichGrille() {
        this.div.empty();
        this.GameOver = false;
        this.joueur = 'rouge';
        for (let row = 0; row < this.ROWS; row++) {
            const $row = $('<div>')
                .addClass('row');
            for (let col = 0; col < this.COLS; col++) {
                const $col = $('<div>')
                    .addClass('col empty')
                    .attr('data-col', col)
                    .attr('data-row', row);
                $row.append($col);
            }
            this.div.append($row);
        }
    }

    ecoute() {
        this.div = $('#puissance4');
        const that = this;

        function selectDerCellVide(col) {
            const cells = $(`.col[data-col='${col}']`);
            for (let i = cells.length - 1; i >= 0; i--) {
                const $cell = $(cells[i]);
                if ($cell.hasClass('empty')) {
                    return $cell;
                }
            }
            return null;
        }

        this.div.on('mouseenter', '.col.empty', function() {
            if (that.GameOver) return;
            const col = $(this).data('col');
            const $derCellVide = selectDerCellVide(col);
            $derCellVide.addClass(`next-${that.joueur}`);
        });

        this.div.on('mouseleave', '.col', function() {
            $('.col').removeClass(`next-${that.joueur}`);
        });

        this.div.on('click', '.col.empty', function() {
            if (that.GameOver) return;
            const col = $(this).data('col');
            const $derCellVide = selectDerCellVide(col);
            $derCellVide.removeClass(`empty next-${that.joueur}`);
            $derCellVide.addClass(that.joueur);
            $derCellVide.data('joueur', that.joueur);

            const winner = that.checkForWinner(
                $derCellVide.data('row'),
                $derCellVide.data('col')
            )
            if (winner) {
                that.GameOver = true;
                alert(`Game Over! Le joueur ${that.joueur} gagne`);
                $('.col.empty').removeClass('empty');
                return;
            }

            that.joueur = (that.joueur === 'rouge') ? 'noir' : 'rouge';
            that.actionJoueur();
            $(this).trigger('mouseenter');
        });
    }

    checkForWinner(row, col) {
        const that = this;
        console.log(row,col)
        function $getCell(i, j) {
            return $(`.col[data-row='${i}'][data-col='${j}']`);
        }

        function verifDirection(direction) {

            let total = 0;
            let j = col + direction.j;
            let i = row + direction.i;
            let $next = $getCell(i, j);
            while (i >= 0 && i < that.ROWS && j >= 0 && j < that.COLS && $next.data('joueur') === that.joueur) {// parcour les jetons du même joueur
                total++;
                j += direction.j;//col
                i += direction.i;//ligne
                $next = $getCell(i, j);
            }
            return total;
        }

        function checkWin(directionA, directionB) {
            const total = 1 + verifDirection(directionA) + verifDirection(directionB);
            if (total >= 4) {
                return that.joueur;
            } else {
                return null;
            }
        }

        function verifDiagoBGtoHD() {
            return checkWin({i: 1, j: -1}, {i: 1, j: 1}); // i = ligne  j = col
        }

        function verifDiagoHGtoBD() {
            return checkWin({i: 1, j: 1}, {i: -1, j: -1});
        }

        function verifVertical() {
            return checkWin({i: -1, j: 0}, {i: 1, j: 0});
        }

        function verifHorizontal() {
            return checkWin({i: 0, j: -1}, {i: 0, j: 1});
        }

        return verifVertical() || verifHorizontal() || verifDiagoBGtoHD() || verifDiagoHGtoBD();
    }

    restart () {
        this.affichGrille();
        this.actionJoueur();
    }
}
