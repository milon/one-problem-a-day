---
extends: _layouts.post
section: content
title: Word search II
problemUrl: https://leetcode.com/problems/word-search-ii/
date: 2022-07-30
categories: [trie]
---

The problem is an extension of the problem word search. We will run backtracking DFS to find the word. But as there are multiple word to search from, we will use a trie data structure, so we can search quickly. Whenever we found a word, we add it to our result and also remove it from the trie.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.isWord = False
        self.refs = 0

    def addWord(self, word: str) -> None:
        cur = self
        cur.refs += 1
        for c in word:
            if c not in cur.children:
                cur.children[c] = TrieNode()
            cur = cur.children[c]
            cur.refs += 1
        cur.isWord = True

    def removeWord(self, word: str) -> None:
        cur = self
        cur.refs -= 1
        for c in word:
            if c in cur.children:
                cur = cur.children[c]
                cur.refs -= 1

class Solution:
    def findWords(self, board: List[List[str]], words: List[str]) -> List[str]:
        root = TrieNode()
        for word in words:
            root.addWord(word)

        ROWS, COLS = len(board), len(board[0])
        res, visited = set(), set()

        def dfs(r: int, c: int, node: TrieNode, word: str) -> None:
            if (
                r < 0
                or r >= ROWS
                or c < 0
                or c >= COLS
                or (r, c) in visited
                or board[r][c] not in node.children
                or node.children[board[r][c]].refs < 1
            ):
                return

            visited.add((r, c))
            node = node.children[board[r][c]]
            word += board[r][c]

            if node.isWord == True:
                node.isWord = False
                res.add(word)
                root.removeWord(word)

            dfs(r+1, c, node, word)
            dfs(r-1, c, node, word)
            dfs(r, c+1, node, word)
            dfs(r, c-1, node, word)
            visited.remove((r, c))

        for r in range(ROWS):
            for c in range(COLS):
                dfs(r, c, root, "")

        return list(res)
```

Time Complexity: `O(n*m*4^(n+k))`, n is the rows of the board, m is the column of the board, k is the length of the words array. <br/>
Space Complexity: `O(n*m*k)`