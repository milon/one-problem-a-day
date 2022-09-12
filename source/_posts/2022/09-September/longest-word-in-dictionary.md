---
extends: _layouts.post
section: content
title: Longest word in dictionary
problemUrl: https://leetcode.com/problems/longest-word-in-dictionary/
date: 2022-09-12
categories: [trie]
---

We will create a trie and insert all the words in our trie. Then we run BFS to get the largest word, as we are only append the word in our BFS queue, when we reach word's end. So, the longest word will always come later, and if we have multiple word with same length, we will take the lexicographically smaller word.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.end = False
        self.word = ''

class Trie:
    def __init__(self):
        self.root=TrieNode()
        
    def insert(self, word: str) -> None:
        node = self.root
        for char in word:
            if char not in node.children:
                node.children[char] = TrieNode()
            node = node.children[char]
        node.end = True
        node.word = word
    
    def bfs(self):
        q = collections.deque([self.root])
        res = ''
        while q:
            curr = q.pop()
            for node in curr.children.values():
                if node.end:
                    q.appendleft(node)
                    if len(node.word)>len(res) or node.word<res:
                        res=node.word
        return res

class Solution:
    def longestWord(self, words: List[str]) -> str:
        trie = Trie()
        for word in words:
            trie.insert(word)
        return trie.bfs()
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`