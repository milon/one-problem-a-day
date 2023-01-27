---
extends: _layouts.post
section: content
title: Concatenated words
problemUrl: https://leetcode.com/problems/concatenated-words/
date: 2023-01-27
categories: [trie]
---

We can use the Trie data structure trie to store the words. Then for each word in the list of words, we use depth first search to see whether it is a concatenation of two or more words from the list. We first build a trie structure that stores the list of words. In every trie node, we use an array of length 26 to store possible next trie node, and a flag to indicate whether the trie node is the last letter of a word in the dictionary.

- Suppose we have a list of words like this, words = [“cat”, “cats”, “catsdogcats”, “dog”, “dogcatsdog”, “hippopotamuses”, “rat”, “ratcatdogcat”]. The trie structure we build looks like the following. If the node is an end of a word, there is a * next to it.
- Next, for each word in the sentence, we search whether the word is a concatenation of two or more other words from the list. We can use depth first search here.
- For each word, we start from the root node of the trie and the first letter of the word. If the letter is not null in the current trie node, we go to the next trie node of that letter. We keep searching until the trie node is an end of a word (with a * in the above graph).
- We increase the count of words the comprise the current word. Then we start from the root node of the trie again, and keep on searching until we reach the end of the current word. If we cannot find the letter in the trie, we go backtrack to the last run of trie nodes and continue the search.
- If we can find a concatenation of words that reaches the end of the current word, we check how many words are concatenated. If it is greater than 2, we put the current word to the final answer.

```python
class TrieNode:
    def __init__(self):
        self.children = [None] * 26
        self.is_end = False

class Solution:
    def __init__(self):
        self.root = TrieNode()
        
    def insert(self, root, key):
        curr = root
        for i in range(len(key)):
            idx = ord(key[i]) - ord('a')
            if not curr.children[idx]:
                curr.children[idx] = TrieNode()
            curr = curr.children[idx]
        curr.is_end = True

    def dfs(self, root, key, index, count):
        if index >= len(key):
            return count > 1
        curr = root
        for i in range(index, len(key)):
            p = ord(key[i]) - ord('a')
            if not curr.children[p]:
                return False
            curr = curr.children[p]
            if curr.is_end:
                if self.dfs(root, key, i+1, count+1):
                    return True
        return False

    def findAllConcatenatedWordsInADict(self, words):
        for i in range(len(words)):
            self.insert(self.root, words[i])
            
        res = []
        for i in range(len(words)):
            if self.dfs(self.root, words[i], 0, 0):
                res.append(words[i])
        
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`

