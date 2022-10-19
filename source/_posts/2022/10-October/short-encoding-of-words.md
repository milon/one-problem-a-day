---
extends: _layouts.post
section: content
title: Short encoding of words
problemUrl: https://leetcode.com/problems/short-encoding-of-words/
date: 2022-10-19
categories: [trie]
---

We can find similar suffixes by reversing each word and adding it to our trie. Then, we can perform DFS on the tree-like structure to obtain all maximum-length chains; i.e., words that are not suffixes.

```python
class TrieNode:
    def __init__(self, char: Optional[str]='#'):
        self.char = char
        self.children = {}  # children nodes
        self.end = False
        
class Trie:
    def __init__(self):
        self.root = TrieNode()
    
    def add(self, word: str) -> None:
        curr = self.root
        for i in range(len(word)):
            if word[~i] not in curr.children:  # ~i = -i-1
                curr.children[word[~i]] = TrieNode(word[~i])
            curr = curr.children[word[~i]]
        curr.end = True  # mark the end of the word

class Solution:
    def minimumLengthEncoding(self, words: List[str]) -> int:
        trie = Trie()
        for word in words:
            trie.add(word)
        def dfs(node: TrieNode, curr: int) -> int:
            return sum(dfs(adj, curr+1) for adj in node.children.values()) if node.children else curr
        return dfs(trie.root, 1)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`