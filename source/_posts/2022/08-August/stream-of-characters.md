---
extends: _layouts.post
section: content
title: Stream of characters
problemUrl: https://leetcode.com/problems/stream-of-characters/
date: 2022-08-13
categories: [trie]
---

We can use a trie to search efficiently in the stream. When we initially create our StreamChecker class, we will insert every word in reverse word. Then whenever we search for a character, we add this to a letters list, and search for the character is the trie.

```python
class TrieNode:
    def __init__(self):
        self.children = {}
        self.endWord = False

class Trie:
    def __init__(self):
        self.root = TrieNode()
        
    def insert(self, word: str) -> None:
        node = self.root
        for char in word:
            if char not in node.children:
                node.children[char] = TrieNode()
            node = node.children[char]
        node.endWord = True

class StreamChecker:
    def __init__(self, words: List[str]):
        self.letters = []
        self.trie = Trie()
        for word in words:
            self.trie.insert(word[::-1])
        
    def query(self, letter: str) -> bool:
        self.letters.append(letter)
        i = len(self.letters) - 1
        node = self.trie.root
        while i >= 0:
            if node.endWord == True:
                return True
            if self.letters[i] not in node.children:
                return False
            node = node.children[self.letters[i]]
            i -= 1
        return node.endWord


# Your StreamChecker object will be instantiated and called as such:
# obj = StreamChecker(words)
# param_1 = obj.query(letter)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
