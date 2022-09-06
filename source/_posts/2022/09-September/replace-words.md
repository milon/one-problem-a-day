---
extends: _layouts.post
section: content
title: Replace words
problemUrl: https://leetcode.com/problems/replace-words/
date: 2022-09-06
categories: [trie]
---

We will use a prefix tree or trie with our dictionary. Then for each word in the sentence, we will look for the root of the word in the trie, if we found something, we will replace it with our root, else we will skip it and move to the next word. We will retrun our sentence after we go through each word of the sentence.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.word = ''
        self.end = False

class Trie:
    def __init__(self):
        self.root = TrieNode()
        
    def insert(self, word: str) -> None:
        curr = self.root
        for c in word:
            if c not in curr.children:
                curr.children[c] = TrieNode()
            curr = curr.children[c]
        curr.end = True
        curr.word = word
        
    def searchRoot(self, word: str) -> str:
        curr = self.root
        for c in word:
            if c not in curr.children:
                return word
            curr = curr.children[c]
            if curr.end:
                return curr.word
        return word if curr.end == False else curr.word

class Solution:
    def replaceWords(self, dictionary: List[str], sentence: str) -> str:
        trie = Trie()
        for word in dictionary:
            trie.insert(word)
            
        sentence = sentence.split(' ')
        for i, word in enumerate(sentence):
            root = trie.searchRoot(word)
            sentence[i] = root
        
        return ' '.join(sentence)
```

Time Complexity: `O(n*k)`, n is the number of words in the dictionary and k is the length of largest word. <br/>
Space Complexity: `O(n*k)`